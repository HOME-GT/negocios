$(function () {
    'use strict'
    $('[data-toggle="offcanvas"]').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open')
    })
})

 /**
  * Función para inicializar un select2
  * @param {*} _url
  * @param {*} _selector
  * @param {*} _estado
  * @param {*} _idpadre
  * @param {*} _idhijo
  * @param {*} _id
  * @param {*} _name
  * @param {*} _description
  */
 function _initSelect2(_url, _selector, _estado=null, _idpadre=null, _idhijo=null, _otro=null, _id="id", _name="text", _description="description"){

    $(_selector).append(new Option("", "", false, false)).trigger('change');

    $(_selector).on('change', function (e) {
         if(!isEmpty(_idhijo)){
              if(!isEmpty($(_idhijo).val())){
                   $(_idhijo).val("").trigger("change");
              }
         }
     });

    $(_selector).select2({
         allowClear: true,
         placeholder: '--Selecione una opción--',
         ajax: {
              url: _url,
              type: "GET",
              headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
              dataType: 'json',
              contentType: 'application/json',
              delay: 250,
              data: function (params) {
                   return {
                        search: params.term,
                        params: {
                             id: _idpadre != null ? $(_idpadre).val() ? $(_idpadre).val() : "0" : "0",
                             estado: _estado != null ? _estado : "",
                             otro: _otro != null ? _otro : ""
                        }
                   };
              },
              processResults: function (data) {
                   let _results = [];
                   for(let d of data.data){ _results.push({id: d[_id], title: d[_description], text: d[_name]}) }
                   return {results: _results};
              }
         },
         templateResult: function (option) {
            //   return $(`<div><strong style="font-size: 0.8rem">${option.text}</strong></div><div style="font-size: 0.7rem"> ${option.title ? option.title : ""}</div>`);
            return option.text;
         },
         templateSelection: function (option) {
            //   return $(`<div><strong style="font-size: 0.8rem">${option.text}</strong></div><div style="font-size: 0.7rem">${option.title ? option.title : ""}</div>`);
            return option.text;
         },
         language: {
              noResults: function(){ return "No se han encontrado resultados."; },
              searching: function() { return "Buscando..."; }
          },
    });
}


/**
     funcion que valida si un objeto, array o string esta vacio
 */
function isEmpty(val) {

    // test results
    //---------------
    // []        true, empty array
    // {}        true, empty object
    // null      true
    // undefined true
    // ""        true, empty string
    // ''        true, empty string
    // 0         false, number
    // true      false, boolean
    // false     false, boolean
    // Date      false
    // function  false
     if (val === undefined)
          return true;

     if (typeof (val) == 'function' || typeof (val) == 'number' || typeof (val) == 'boolean' || Object.prototype.toString.call(val) === '[object Date]')
          return false;

     if (val == null || val.length === 0)        // null or 0 length array
          return true;

     if (typeof (val) == "object") {
        // empty object
        var r = true;
        for (var f in val)
            r = false;
        return r;
    }

    return false;
}



/**
 * Función para aceptar en un input solo números
 * @param {*} selector
 */
function _inputNumero(selector) {
    $(selector).keypress(function (e) {
        if (e.which == 13) { return; }
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
}



/**
 * Función generica para crear data table
 */
function CrearDataTable(_route, _columns, _loading=true, _solobusqueda=false){
 //   if(_loading){ _initLoader();}

    $('#data-table').DataTable({
          paginate: true,
          searching: true,
          info: true,
          processing: true,
          serverSide: true,
          destroy: true,
          language: {
               info: "Mostrando página _PAGE_ de _PAGES_",
               infoEmpty: "Mostrando 0 de 0 registros",
               infoFiltered: "(filtrado de _MAX_ registros.)",
               thousands: ",",
               decimal: ".",
               lengthMenu: "Mostrando _MENU_ registros por página",
               loadingRecords: "Cargando...",
               processing: "Cargando...",
               search: "Buscar:",
               zeroRecords: "No se encontraron resultados en la búsqueda.",
               paginate: {
                    first: "Primera",
                    last: "Última",
                    next: "Siguiente",
                    previous: "Anterior"
               },
               pagingType: "simple",
               aria: {
                    sortAscending:  ": activar para ordenar la columna ascendente",
                    sortDescending: ": activar para ordenar la columna descendente"
               }
          },
          ajax: {
               url: _route,
               dataType: "JSON",
               type: "POST",
               headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
          },
          columns: _columns,
          initComplete: function () {
            var _selector = "#" + this[0].id;
            var id = 0;
            $(_selector+' thead tr').clone(true).appendTo(_selector+' thead');
            $(_selector+' thead tr:eq(1) th').each( function (i) {
                if($(this).hasClass("buscar")){
                    var column = $(this);
                    var title = $(this).text();
                    var input = $(this).html('<input type="text" id="hm-search-'+id+'" class="form-control form-control-sm rounded-0 border-0" placeholder="Buscar en '+title.toLowerCase()+'" />');
                }
                else{
                    $(this).html('');
                }
                $(this).removeAttr("class").removeAttr("tabindex").removeAttr("aria-controls").removeAttr("rowspan").removeAttr("colspan").removeAttr("aria-sort").removeAttr("aria-label");
                $(this).css("padding", "0px");
                $(this).unbind();
                id++;
            });

            id=0;
            this.api().columns().every(function () {
                var column = this;
                $("#hm-search-"+id).on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? val : '', true, false, false).draw();
                });
                id++;
            });
        },
          drawCallback: function (s) {
              if(!_solobusqueda){
                    $("#data-table_length label select").addClass("selectDataTable");
                    $("#data-table_filter label input").addClass("form-control form-control-sm").attr("placeholder", "Buscar en toda la tabla").css("width", "200px").css("display", "inline-block");
              }
              else{
                $("#data-table_length").addClass("d-none");
                $("#data-table_filter").addClass("d-none");
              }
   //          if(_loading){ _endLoader(); }
          }
     });
}


/*
 * Función genérica para borrar registros
 */
function BorrarRegistro(_url, _nombreRegistro, _urlredirect=""){
     alertify.confirm("Confirmación de eliminación", "Esta seguro de eliminar: "+_nombreRegistro,
          function(){
               $.ajax({
                    url: _url,
                    type: "POST",
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function(data){
                         if(data.exito){
                              alertify.success('Registro eliminado con éxito.');
                              setTimeout(function() {
                                   if(_urlredirect == ""){
                                        location.reload();
                                   }
                                   else{
                                        location.href = _urlredirect;
                                   }
                               }, 500);
                         }
                         else{
                              alertify.error('ERROR: '+data.mensaje);
                         }
                    },
                    error: function(error){
                         alertify.error('ERROR: El registro ['+_nombreRegistro+"] no pudo ser eliminado.");
                    }
               });
          },
          function(){
               alertify.error('Eliminación cancelada');
          }
     );
}