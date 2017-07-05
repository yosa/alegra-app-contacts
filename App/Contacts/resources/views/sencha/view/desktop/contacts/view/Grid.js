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
            flex: 1
        },
        {
            dataIndex: 'phone1',
            text: 'Teléfono 1',
            flex: 1
        },
        {
            dataIndex: 'observations',
            text: 'Observaciones',
            width: 200
        },
        {
            xtype: 'widgetcolumn',
            width: 30,
            widget: {
                xtype: 'button',
                iconCls: 'x-fa fa-eye',
                tooltip: 'Ver contacto',
                bind: {
                    melisa: '{modules.view}',
                    hidden: '{!modules.view.allowed}'
                },
                listeners: {
                    click: 'onShowItemReport'
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
                    melisa: '{modules.delete}',
                    hidden: '{!modules.delete.allowed}'
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
