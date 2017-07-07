Ext.define('Alegra.contacts.view.desktop.contacts.update.Wrapper', {
    extend: 'Alegra.contacts.view.desktop.contacts.add.Wrapper',
    
    requires: [
        'Alegra.contacts.view.desktop.contacts.add.Wrapper',        
        'Alegra.contacts.view.desktop.contacts.update.WrapperController'     
    ],
    
    iconCls: 'x-fa fa-pencil',
    controller: 'contactsContactsUpdate',
    viewModel: {
        data: {
            mode: 'update'
        }
    },
    
    listeners: {
        loaddata: 'onLoadData',
        successloadremotedata: 'onSuccessLoadData',
        beforeloaddata: 'onBeforeLoadData'
    }
});