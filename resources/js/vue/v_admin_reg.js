ELEMENT.locale(ELEMENT.lang.en)

new Vue({
    el : '#v_adminreg',
    data(){
        return { 
            active : 2,
            adminTask : {
                firstname : '', lastname: '', primary_address : '', secondary_address: '',
                contactNumber: '', email: '', username: '', password: '', conpass: '',
                sec_question : '', sec_answer: ''
            },
            options: [{
                value: 'Option1',
                label: 'Option1'
              }, {
                value: 'Option2',
                label: 'Option2'
              }, {
                value: 'Option3',
                label: 'Option3'
              }, {
                value: 'Option4',
                label: 'Option4'
              }, {
                value: 'Option5',
                label: 'Option5'
              }],
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
                contactNumber: [
                    {required: true, message: 'Please provide contact number'}
                ],
                email: [
                    {required: true, type: 'email', message: 'Please input your email'}
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
                    {required: true, message: 'Please select security question', trigger: 'change'}
                ], sec_answer: [
                    {required: true, message : 'Please provide security answer'}
                ]
            }
        }
    },
    methods: {
        onNextInfo: function(ruleForm){
            this.$refs[ruleForm].validate((valid) => {
                if (valid) {
                    this.active++;
                } else {
                    return false;
                }
                });
        },
        onBack: function(){
            if(this.active == 1){
                return false;
            }else{
                this.active--;
            }
        }
    }
})