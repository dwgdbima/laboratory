(function ($, DataTable) {
    "use strict";
    DataTable.ext.buttons.create.text = function (dt) {
        return '<i class="fas fa-plus"></i> ' + dt.i18n('buttons.create', 'Tambah Data');
    };

    DataTable.ext.buttons.create.action = function (e, dt, button, config) {
        try {
            _create();
        } catch (error) {
            window.location = window.location.href.replace(/\/+$/, "") + '/create';
        }
    };

    DataTable.ext.buttons.reload.text = function (dt) {
        return '<i class="fas fa-sync"></i> ' + dt.i18n('buttons.reload', 'Refresh');
    };
})(jQuery, jQuery.fn.dataTable);