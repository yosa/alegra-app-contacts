Ext.define('Alegra.contacts.view.universal.contacts.add.WrapperController', {
    
    /**
     * The functionality can be reused in other versions (phone or table).
     * @param object values
     */
    addPeople: function(values, form) {
        var me = this,
            vm = me.getViewModel(),
            store = vm.getStore('internalContacts');
        
        if( !me.isValidInput(values, form)) {
            return false;
        }
        
        store.add(values);        
        return true;
    },
    
    /**
     * Is responsible for validating before adding staff.
     * The functionality can be reused in other versions (phone or table).
     * @param object values
     * @returns {Boolean}
     */
    isValidInput: function(values, form) {
        if( values.sendNotifications && Ext.isEmpty(values.email)) {
            form.findField('email').markInvalid('Es necesario especificar el correo electrónico');
            return false;
        }
        
        return true;
    },
    
    /**
     * The functionality can be reused in other versions (phone or table).
     * @param object values
     */
    updatePeople: function(record, values, form) {
        if( !this.isValidInput(values, form)) {
            return false;
        }
        record.set(values);
        return true;
    }
    
});