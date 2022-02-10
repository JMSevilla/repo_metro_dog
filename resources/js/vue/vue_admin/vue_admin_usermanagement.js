ELEMENT.locale(ELEMENT.lang.en)
import __constructJS from "../../main.js"
import responseConfiguration from "../../Response.js"
new Vue({
    el : '#v_usermanagement',
    data() {
        // Contact # Validation //
        var checkPhone = (rule, value, callback) => {
            const phoneReg = /^(09|\+639)\d{9}$/
            if (!value) {
              return callback(new  Error('Please provide valid contact number'))
            }
            setTimeout(() => {
              
              if (!Number.isInteger(+value)) {
                callback(new  Error('Please enter 11 digit number'))
              } else {
                if (phoneReg.test(value)) {
                  callback()
                } else {
                  callback(new  Error('The phone number format is incorrect'))
                }
              }
            }, 100)
          }
          
        return {
          
          dialog: false,
          tableData: [{
            id:'1',
            date: '2016-05-03',
            name: 'Tom',
            lname: 'Tom',
            address: 'No. 189, Grove St, Los Angeles'
          }, {
            id:'1',
            date: '2016-05-02',
            name: 'John',
            lname: 'Tom',
            address: 'No. 189, Grove St, Los Angeles'
          }, {
            id:'1',
            date: '2016-05-04',
            name: 'Morgan',
            lname: 'Tom',
            address: 'No. 189, Grove St, Los Angeles'
          }, {
            id:'1',
            date: '2016-05-01',
            name: 'Jessy',
            lname: 'Tom',
            address: 'No. 189, Grove St, Los Angeles'
          }],
          addUser : {
            firstname : '', lastname: '',     primary_address : '', secondary_address: '', mdbranch: '',
            contactNumber: '', email: '', username: '', password: '', conpass: '',
            sec_question : '', sec_answer: '', user_type: '', uamtrigger: 1
        },
          search: '',
          optionsQuestions: [],
          optionsBranch: [],
        rules: {
            firstname : [
                {required : true, message: 'Please enter firstname'}
            ],
            lastname : [
                {required: true, message: 'Please enter lastname'}
            ],
            primary_address: [
                {required: true, message: 'Please provide your primary address'}

            ],
            secondary_address: [
                {required: false, }
            ],
            mdbranch: [
                {required: false, }
            ],
            contactNumber: [
                {validator: checkPhone, trigger: 'blur'},
                {required: true, message: 'Please provide valid contact number', trigger: 'change' },
                { min: 11, max: 11, message: 'Please enter 11 digit number', trigger: 'change'}
            ],
            email: [
                {type: 'string',required: true,message: 'Please enter email address',trigger: 'blur'},
                {required: true, type: 'email', message: 'Please provide a valid email address',trigger: 'change'}
            ],
            username : [
                {required: true, message: 'Please provide your username'}
            ],
            password : [
                {required: true, message: 'Please provide your password'}
                
            ],
            conpass : [
                {required: true, message: 'Please confirm your password'}
            ],
            sec_question: [
                {required: true, message: 'Please select security question', trigger: 'blur'}
            ], sec_answer: [
                {required: true, message : 'Please provide security answer'}
            ],
            user_type: [
                {required: true, message : 'Please select user type',trigger: 'blur'}
            ]
            
        }
     };
},
      created(){
        this.fetchQuestion();
        this.fetchBranch();
      },
        methods: {
          fetchQuestion: function() {
            __constructJS.fetchQuestionClientRequest().then(r => {
                responseConfiguration.getResponse(r).then(__debounce => {
                    this.optionsQuestions = __debounce[0].key
                })
            })
        },

        fetchBranch: function() {
            __constructJS.fetchBranchClientRequest().then(r => {
                responseConfiguration.getResponse(r).then(__debounce => {
                    this.optionsBranch = __debounce[0].key
                })
            })
        },
        onFinish: function(ruleForm){
          if(this.addUser.password!== this.addUser.conpass)
          {
              this.$notify.error({
                  title: 'Error',
                  message: 'Password doesn\'t match', 
                  offset: 100
                });
          }
          this.$refs[ruleForm].validate((valid) => {
              if (valid) {
                this.$confirm('Are you sure you want to save this as user?', 'Adding User Confirmation', {
                  confirmButtonText: 'OK',
                  cancelButtonText: 'Cancel',
                  type: 'info'
                }).then(() => {
                  setTimeout(() => {
                      __constructJS.postUserRegistration_ClientRequest(this.addUser).then((r) => {
                          console.log(r)
                          responseConfiguration.getResponse(r).then(__debounce => {
                              switch(true) {
                                  case __debounce[0].key === "user_registration":
                                      this.$notify.success({
                                          title: 'Success',
                                          message: 'User Successfully Registered',
                                          offset: 100
                                        });
                              }
                          })
                      })
                  }, 3000)
                })

              }
              else {
                  return false;
              }
              });
      },

          handleClose(done) {
            this.$confirm('Are you sure to cancel adding user?')
              .then(_ => {
                done();
              })
              .catch(_ => {});
          }
          

      }
})