Ext.define('Alegra.contacts.view.desktop.contacts.view.Wrapper', {
    extend: 'Melisa.view.desktop.wrapper.panel.View',
    
    requires: [
        'Melisa.view.desktop.wrapper.panel.View',
        'Alegra.contacts.view.desktop.contacts.view.Grid',
        'Alegra.contacts.view.desktop.contacts.view.WrapperController',
        'Alegra.contacts.view.universal.contacts.view.WrapperModel'
    ],
    
    iconCls: 'x-fa fa-inbox',
    controller: 'contactsContactsView',
    viewModel: {
        type: 'contactsContactsView'
    },
    items: [
        {
            xtype: 'contactsContactsViewGrid',
            region: 'center',
            listeners: {
                itemdblclick: 'onShowItemReport'
            },
            plugins: [
                {
                    ptype: 'autofilters',
                    filters: {
                        name: {
                            operator: 'like',
                            minChars: 1
                        }
                    },
                    filtersIgnore: [
                        'phonePrimary',
                        'identification',
                        'observations',
                        'email'
                    ]
                },
                {
                    ptype: 'floatingbutton',
                    configButton: {
                        handler: 'moduleRun',
                        iconCls: 'x-fa fa-plus',
                        scale: 'large',
                        tooltip: 'Agregar contacto',
                        bind: {
                            melisa: '{modules.add}',
                            hidden: '{!modules.add.allowed}'
                        }
                    }
                }
            ]
        }
    ]
});