Ext.define('Alegra.contacts.view.desktop.contacts.add.WrapperController', {
    extend: 'Melisa.controller.Create',
    alias: 'controller.contactsContactsAdd',
    
    eventSuccess: 'event.contacts.contacts.create.success',
    
    onSelectPostalCode: function(field, record) {
        var me = this,
            view = me.getView(),
            txtColony = view.down('#txtColony'),
            txtLocality = view.down('#txtLocality'),
            txtMunicipality = view.down('#txtMunicipality'),
            txtState = view.down('#txtState'),
            next = field.nextNode();
        
        txtColony.setValue(record.get('settlement'));
        txtLocality.setValue(record.get('municipality'));
        txtMunicipality.setValue(record.get('municipality'));
        txtState.setValue(record.get('state'));
        next.focus();
    }
    
});
