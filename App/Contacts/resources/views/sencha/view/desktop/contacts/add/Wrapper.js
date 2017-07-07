Ext.define('Alegra.contacts.view.desktop.contacts.add.Wrapper', {
    extend: 'Melisa.view.desktop.wrapper.window.Add',
    
    requires: [
        'Melisa.view.desktop.wrapper.window.Add',
        'Alegra.contacts.view.desktop.contacts.add.Form',
        'Alegra.contacts.view.desktop.contacts.add.WrapperController',
        'Alegra.contacts.view.universal.contacts.add.WrapperModel'
    ],
    
    iconCls: 'x-fa fa-inbox',
    defaultFocus: 'txtName',
    controller: 'contactsContactsAdd',
    layout: 'fit',
    height: '100%',
    width: '100%',
    maxWidth: '100%',
    minWidth: '90%',
    bodyPadding: 0,
    viewModel: {
        type: 'contactsContactsAdd'
    },
    items: [
        {
            xtype: 'contactsContactsAddForm'
        }
    ],
    bbar: {
        xtype: 'toolbardefault'
    }
});
