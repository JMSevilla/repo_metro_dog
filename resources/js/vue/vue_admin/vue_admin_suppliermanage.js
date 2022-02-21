ELEMENT.locale(ELEMENT.lang.en)
import __constructJS from "../../main.js"
import responseConfiguration from "../../Response.js"
new Vue({
    el : '#v_suppliermanage',

    data() {
        return {
          table: false,
          dialog: false,
          loading: false,
          gridData: [{
            date: '2016-05-02',
            name: 'Peter Parker',
            address: 'Queens, New York City'
          }, {
            date: '2016-05-04',
            name: 'Peter Parker',
            address: 'Queens, New York City'
          }, {
            date: '2016-05-01',
            name: 'Peter Parker',
            address: 'Queens, New York City'
          }, {
            date: '2016-05-03',
            name: 'Peter Parker',
            address: 'Queens, New York City'
          }],
          form: {
            name: '',
            region: '',
            date1: '',
            date2: '',
            delivery: false,
            type: [],
            resource: '',
            desc: ''
          },
          formLabelWidth: '80px',
          timer: null,
        };
      },

      methods: {
        addSupplier() {
          this.$confirm('Are you sure you want to add this supplier?', 'Adding Supplier Confirmation', {
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            type: 'info'
          }).then(() => {
            this.$notify.success({
              message: 'Successfully Added Supplier', 
              offset: 100,
            }); this.table = false;
          }).catch(() => {
            
          });
        }
      }
    
})