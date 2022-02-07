ELEMENT.locale(ELEMENT.lang.en)

new Vue({
    el : '#v_usermanagement',

    data() {
        return {
          tableData: [{
            date: '2016-05-03',
            name: 'Tom',
            address: 'No. 189, Grove St, Los Angeles'
          }, {
            date: '2016-05-02',
            name: 'John',
            address: 'No. 189, Grove St, Los Angeles'
          }, {
            date: '2016-05-04',
            name: 'Morgan',
            address: 'No. 189, Grove St, Los Angeles'
          }, {
            date: '2016-05-01',
            name: 'Jessy',
            address: 'No. 189, Grove St, Los Angeles'
          }],
          search: '',
        }
      },
      methods: {
        handleEdit(index, row) {
          console.log(index, row);
        },
        handleDelete(index, row) {
          console.log(index, row);
        }
      },
})