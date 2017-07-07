Ext.define('Alegra.contacts.view.desktop.contacts.view.Grid', {
    extend: 'Ext.grid.Panel',    
    alias: 'widget.contactsContactsViewGrid',
    
    emptyText: 'No hay contactos registrados',
    deferEmptyText: true,
    bind: {
        store: '{contacts}'
    },
    columns: [
        {
            dataIndex: 'id',
            text: 'Id',
            hidden: true
        },
        {
            dataIndex: 'name',
            text: 'Razón social',
            flex: 1
        },
        {
            dataIndex: 'identification',
            text: 'RFC',
            flex: 1,
            sortable: false
        },
        {
            dataIndex: 'phonePrimary',
            text: 'Teléfono 1',
            flex: 1,
            sortable: false
        },
        {
            dataIndex: 'email',
            text: 'Correo electrónico',
            flex: 1,
            hidden: true
        },
        {
            dataIndex: 'phoneSecondary',
            text: 'Teléfono secundario',
            flex: 1,
            hidden: true,
            sortable: false
        },
        {
            dataIndex: 'observations',
            text: 'Observaciones',
            width: 200,
            sortable: false
        },
        {
            xtype: 'widgetcolumn',
            width: 30,
            widget: {
                xtype: 'button',
                iconCls: 'x-fa fa-eye',
                tooltip: 'Ver contacto',
                handler: 'onShowContact',
                bind: {
                    melisa: '{modules.view}',
                    hidden: '{!modules.view.allowed}'
                }
            }
        },
        {
            xtype: 'widgetcolumn',
            width: 30,
            widget: {
                xtype: 'button',
                iconCls: 'x-fa fa-pencil',
                tooltip: 'Modificar contacto',
                bind: {
                    melisa: '{modules.update}',
                    hidden: '{!modules.update.allowed}'
                },
                listeners: {
                    click: 'moduleRun',
                    loaded: 'onLoadedModuleUpdate'
                }
            }
        },
        {
            xtype: 'widgetcolumn',
            width: 30,
            widget: {
                xtype: 'button',
                iconCls: 'x-fa fa-trash',
                tooltip: 'Eliminar contacto',
                bind: {
                    melisa: '{modules.delete}',
                    hidden: '{!modules.delete.allowed}'
                },
                plugins: {
                    ptype: 'buttonconfirmation',
                    messageSuccess: 'Contacto eliminado'
                }
            }
        }
    ],
    selModel: {
        selType: 'checkboxmodel'
    },
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true
    }
});
