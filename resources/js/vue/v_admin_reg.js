ELEMENT.locale(ELEMENT.lang.en)
import __constructJS from "../main.js"
import responseConfiguration from "../Response.js"
new Vue({
    el : '#v_adminreg',

    data(){
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
       
            active : 3,
            adminTask : {
                firstname : 'admin fname', lastname: 'admin lname', primary_address : 'test', secondary_address: '', mdbranch: 'batino',
                contactNumber: '123', email: 'admin@gmail.com', username: 'admin', password: 'admin', conpass: '',
                sec_question : 'test', sec_answer: 'test',  trigger: 1
            },
            
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
                ]
            },
            fullscreenLoading: false
        }
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

        onNextInfo: function(ruleForm){
            if(this.adminTask.password!== this.adminTask.conpass)
            {
                this.$notify.error({
                    title: 'Error',
                    message: 'Password doesn\'t match', 
                    offset: 100
                  });
            }
            else
            {
            this.$refs[ruleForm].validate((valid) => {
                if (valid) {
                    this.active++;
                } else {
                    return false;
                }
                });
            }
        }, 
        onFinish: function() {
            this.$confirm('Are you sure you want to save this as admin?', 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
              }).then(() => {
                this.fullscreenLoading = true
                setTimeout(() => {
                    __constructJS.postAdmin_ClientRequest(this.adminTask).then((r) => {
                        console.log(r)
                        responseConfiguration.getResponse(r).then(__debounce => {
                            switch(true) {
                                case __debounce[0].key === "success_registration":
                                    this.$notify.success({
                                        title: 'Success',
                                        message: 'Successfully Registered',
                                        offset: 100
                                      });
                                      this.fullscreenLoading = false;
                                      setTimeout(() => {
                                        window.location.href = "http://localhost/metrodog"
                                      }, 3000)
                                      return true;
                            }
                        })
                    })
                }, 3000)
              })
        },
        onBack: function(){
            if(this.active == 1){
                return false;
            }else{
                this.active--;
            }
        },
    }




})

