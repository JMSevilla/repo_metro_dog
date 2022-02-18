ELEMENT.locale(ELEMENT.lang.en)

new Vue({
    el : '#v_profilemanage',

    data() {
        return {
          activeName: 'first'
        };
      },
      methods: { 
        handleClick(tab, event) {
            console.log(tab, event);
          },
        updateProfile: function(){
          this.$confirm('Are you sure you want to save changes?', 'Update User Profile', {
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel',
            type: 'info'
          })
        }
      }
    
})