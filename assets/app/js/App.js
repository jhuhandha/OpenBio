var resource = {
  notify:function(titulo, mensaje, tipo, icon){
    new PNotify({
      title: titulo,
      text: mensaje,
      type: tipo,
      shadow: false,
      icon: icon,
      delay:2000
    });
  },
  parsley:function(id){
    return $( '#'+id ).parsley().validate();
  },
  lenguajeTable:function(){
    var array={
              "sLengthMenu": "Mostrar _MENU_ registros por página",
              "sZeroRecords": "No se han encontrado registros relacionados a la busqueda",
              "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
              "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
              "sInfoFiltered": "(filtrados _MAX_ registros en total)"
            };
    return array;
  },
  marcarMenu:function(idSubMenu,idMenu){
    localStorage.setItem('subMenuId', idSubMenu);
    localStorage.setItem('menuId', idMenu);
  },
  mantenerMenu:function(){
    subMenu= localStorage.getItem('subMenuId');
    Menu= localStorage.getItem('menuId');
    jQuery('#'+subMenu).attr('class','active');
    jQuery('#'+Menu).attr('class','in');
  },
  bloquearEntradas:function(){
    //document.oncontextmenu = function(){return false;}
    $(window).keypress(function (e) {
       if (e.keyCode  == 123) {
          return false;
       }
    });
  },
  handleFileSelect:function(evt) {
      var files = evt.target.files; // FileList object

      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            $( ".thumb" ).remove();
            span.innerHTML = ['<img id="imgThumb" class="thumb" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'].join('');
            document.getElementById('list').insertBefore(span, null);
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    }
}

var usuario = {
  CrearUsuario:function(form){
      if(resource.parsley(form)){
          var formData = new FormData($("#usuario-form")[0]);
          $.ajax({
              url: "Create",
              type: 'POST',
              data: formData,
              dataType:'text',
              cache: false,
              contentType: false,
              processData: false
          }).done(function(data){
            if(data=="1"){
              alert("Datos registrados con exito");
              location.href = "usuario/index";
            }else if(data=="2"){
              alert("No se pudo registrar los datos");
            }else{
              alert(data);
            }
          });
      }
  },
  ListaUsuario:function(){
      jQuery.ajax({
          type: "POST",
          url: "ListarUsuario",
          dataType:'json'
      }).done(function (data, textStatus, jqXHR) {
         var arrdata = [];
         var array = data.result;
         $.each(array, function(index,obj){
              var boton = obj.idRol == 1?'<a class="btn btn-primary" onclick="usuario.CambiarRol('+obj.idUsuario+',2)" id="Modify1">Vitrina</a>':'<a class="btn btn-info" onclick="usuario.CambiarRol('+obj.idUsuario+',1)" id="Remove1">Usuario</a>';
              arrdata.push([obj.Nombre, obj.Apellido, obj.Email, boton]);
              //console.log(data.Nombre);
         });

         $('#dynamicUsuario').html( '<table class="table table-hover table-condensed" id="tblUsuario"></table>' );
              $('#tblUsuario').dataTable( {
                "oLanguage": resource.lenguajeTable(),
                  "aaData": arrdata,
                  "aoColumns": [
                  { "sTitle": "Nombre" },                        
                  { "sTitle": "Apellido" },                        
                  { "sTitle": "Email" },                        
                  { "sTitle": "Administrar" , "sClass": "col-md-2 col-sm-2"}                          
                  ]
              });

          $('#tblUsuario').each(function(){
            var datatable = $(this);
                // Buscar - Add the placeholder for Buscar and Turn this into in-line form control
                var Buscar_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                Buscar_input.attr('placeholder', 'Buscar');
                Buscar_input.addClass('form-control');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.addClass('form-control');
          });

      }).fail(function (qXHR, textStatus, errorThrown) {
          alert("error");
      });
  },
  CambiarRol:function(id,rol){
  
    $.ajax({
        url: "CambiarRol",
        type: 'POST',
        data: {'id':id,'rol':rol},
        dataType:'text',
        cache: false
    }).done(function(data){
      if(data=="1"){
        resource.notify('En hora buena','Se guardo la información','success','glyphicon glyphicon-ok');
        usuario.ListaUsuario();
      }else if(data=="2"){
        resource.notify('Upss','Ha ocurrido un error','error', 'glyphicon glyphicon-remove');
      }else{
        resource.notify('Upss',data, 'glyphicon glyphicon-remove');
      }
    }).fail(function(){
       resource.notify('Upss',"Error", 'glyphicon glyphicon-remove');
    });
  }
}

var productos = {
  CrearProducto:function(form){
    if(resource.parsley(form)){
        var formData = new FormData($("#productos-form")[0]);
        $.ajax({
            url: "Create",
            type: 'POST',
            data: formData,
            dataType:'text',
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data){
          if(data=="1"){
            resource.notify('En hora buena','Se guardo la información','success','glyphicon glyphicon-ok');
            productos.ListaProductos();
            productos.LimpiarProducto();
          }else if(data=="2"){
            resource.notify('Upss','Ha ocurrido un error','error', 'glyphicon glyphicon-remove');
          }else{
            var error = data.split(".");
            if(error[0]=="4"){
              resource.notify('Upss',"Solo tienes permitido el registro de "+error[1]+" Productos", 'glyphicon glyphicon-remove');
            }else{
              resource.notify('Upss',data, 'glyphicon glyphicon-remove');
            }
          }
        });
    }
  },
  ListaProductos:function(){
      jQuery.ajax({
          type: "POST",
          url: "ListarProductos",
          dataType:'json'
      }).done(function (data, textStatus, jqXHR) {
         var arrdata = [];
         var array = data.result;
          
         $.each(array, function(index,obj){
              arrdata.push(['<img id="imgThumb" src="'+obj.Foto+'" style="height: 150px;  width: 200px;"/>', obj.NombreProducto, obj.Categoria, obj.FichaTecnica, '<a class="btn btn-warning" onclick="productos.SelectCampos('+obj.idProductos+','+"'"+obj.Foto+"'"+','+"'"+obj.NombreProducto+"'"+','+"'"+obj.FichaTecnica+"'"+','+"'"+obj.idCategoria+"'"+')" id="Modify1">Modificar</a>']);
         });

         $('#dynamicProductos').html( '<table class="table table-hover table-condensed" id="tblProductos"></table>' );
              $('#tblProductos').dataTable( {
                "oLanguage": resource.lenguajeTable(),
                  "aaData": arrdata,
                  "aoColumns": [
                  { "sTitle": "Foto" , "sClass": "col-md-2 col-sm-2"},                        
                  { "sTitle": "Nombre" },                        
                  { "sTitle": "Categoria" },                        
                  { "sTitle": "Ficha tecnica" },                        
                  { "sTitle": "Administrar" , "sClass": "col-md-2 col-sm-2"}                          
                  ]
              });

          $('#tblProductos').each(function(){
            var datatable = $(this);
                // Buscar - Add the placeholder for Buscar and Turn this into in-line form control
                var Buscar_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                Buscar_input.attr('placeholder', 'Buscar');
                Buscar_input.addClass('form-control');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.addClass('form-control');
          });

      }).fail(function (qXHR, textStatus, errorThrown) {
          alert("error");
      });
  },
  SelectCampos:function(id, foto, nombre, ficha, idcategoria){
    $('#txtNombre').val(nombre);
    $('#ddlCategoria').val(idcategoria);
    $('#txtFichaTecnica').text(nombre);
    $('#list').html("<span><img id='imgThumb' src='"+foto+"' class='thumb'/></span>");

    $('#txtCodigo').val(id);

    $('#btnModificar').removeAttr("disabled");
    $('#btnModificar').attr("onclick",'javascript: productos.ModificarProducto("productos-form");');
    $('#btnGuardar').attr("disabled",true);
    $('#btnGuardar').removeAttr("onclick");
    $("#modalProductos").modal('hide');
  },
  LimpiarProducto:function(){
    $('#txtNombre').val("");
    $('#ddlCategoria').val("");
    $('#txtCodigo').val("");
    var valor = "";
    $("#ddlCategoria option").val("");
    $('#txtFichaTecnica').val('');
    $('#imgThumb').remove();

    $('#btnModificar').attr("disabled");
    $('#btnModificar').removeAttr("onclick");
    $('#btnGuardar').attr("onclick",'javascript: productos.CrearProducto("productos-form");');
    $('#btnGuardar').removeAttr("disabled");
    $("#modalProductos").modal('hide');
  },
  ModificarProducto:function(form, id){
    if(resource.parsley(form)){
        var formData = new FormData($("#productos-form")[0]);
        $.ajax({
            url: "Update",
            type: 'POST',
            data: formData,
            dataType:'text',
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data){
          if(data=="1"){
            resource.notify('En hora buena','Se modifico la información','success','glyphicon glyphicon-ok');
            productos.ListaProductos();
            productos.LimpiarProducto();
          }else if(data=="2"){
            resource.notify('Upss','Ha ocurrido un error','error', 'glyphicon glyphicon-remove');
          }else{
            var error = data.split(".");
            if(error[0]=="4"){
              resource.notify('Upss',"Solo tienes permitido el registro de "+error[1]+" Productos", 'glyphicon glyphicon-remove');
            }else{
              resource.notify('Upss',data, 'glyphicon glyphicon-remove');
            }
            productos.LimpiarProducto();
          }
        });
    }
  },
};