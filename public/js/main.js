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
