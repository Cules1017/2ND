
// an hien password
x = true;
 function showHiddenpass(){
     if(x){
        document.getElementById('pass').setAttribute("type","text");
         x = false;
     }else{
        document.getElementById('pass').setAttribute("type","password");
         x = true;
     }
}

y = true;
 function showHiddenrepass(){
     if(y){
        document.getElementById('repass').setAttribute("type","text");
         y = false;
     }else{
        document.getElementById('repass').setAttribute("type","password");
         y = true;
     }
}

// function validate() {
//     var u = document.forms["contactForm"]["username"].value;
//     // var fname = document.getElementById("fname").value;
//     var p = document.forms["contactForm"]["pass"].value;
//     // var sname = document.getElementById("sname").value;
    
 
//     if (u == null || u == "") {
//         alert("Username must be filled out");
//         return false;
//     } else if (p == null || p == "") {
//         alert("Password must be filled out");
//         return false;
//     } 
// }


// đối tượng 'validator'
function Validator(options){

    function getParent(element, selector){
        while(element.parentElement){
            if(element.parentElement.matches(selector)){
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var selectorRules = {}
    // hàm thực hiện validate
    function Validate(inputElement,rule){
        //var erroElemant = getParent(inputElemant, '.form-group')
        var errorMessage ;
        var errorElement = getParent(inputElement,options.formGroupSelector).querySelector(options.errorSelector);  
        // lấy ra các rule của selector
        var rules = selectorRules[rule.selector];
        // lặp qua từng rule và check
        //nếu có lỗi thì dừng
        for ( var i=0 ; i<rules.length; ++i) {
            switch (inputElement.type){
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        document.querySelector(rule.selector + ':check')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            
            if (errorMessage) break;
        }

        if(errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement,options.formGroupSelector).classList.add('invalid');
        }else {
            errorElement.innerText = '';
            getParent(inputElement,options.formGroupSelector).classList.remove('invalid');
        }

        return ! errorMessage;
    }
    // lấy elemant của form cần validate
    var formElement = document.querySelector(options.form);

    if (formElement){
        //khi submit form
        formElement.onsubmit = function(e){
            e.preventDefault();

            var isFormValid = true;
            //thu hien lặp qua từng rule 
            options.rules.forEach(function(rule){
                var inputElement = formElement.querySelector(rule.selector);
                
                var isValid = Validate(inputElement, rule);
                if(!isValid){
                    isFormValid = false;
                }
            });
            

            if(isFormValid){
                // truong hop submit với javascript
                if (typeof options.onSubmit === 'function'){
                    var enableInputs = formElement.querySelectorAll('[name]');

                    var formValues = Array.from(enableInputs).reduce(function(values,input){
                        switch(input.type){
                            case 'radio' :
                                values[input.name]=formElement.querySelector('input [name="' + input.name + '"]"checked').value;
                                break;
                            case 'checkbox':
                                if(input.matches(':checked')) {
                                    values[input.name]='';
                                    return values;
                                }

                                if (!Array.isArray(values[input.name]) ){
                                    values[input.name]=[];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
                                values[input.name] = input.files
                            default:
                                values[input.name]=input.value;
                        }
                        return  values;
                    },{});

                    options.onSubmit(formValues);
                }
                //submit với hành vi mặc định
                else{
                    formElement.submit();
                }
            }
        }


        //lặp qua mỗi rule và xử lý
        options.rules.forEach(function(rule){

            //Lưu lại rules cho mỗi input
            if(Array.isArray(selectorRules[rule.selector])){
                selectorRules[rule.selector].push(rule.test);
            }else{
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElements = formElement.querySelectorAll(rule.selector);
            
            Array.from(inputElements).forEach(function(inputElement){
                // xu ly blur khỏi input
                inputElement.onblur = function() {
                    //value: inputElement.value
                    //test func: rule.test
                    Validate(inputElement, rule);
                    
                }
                // xu li truong hop moi khi truong hop nhap vao input
                inputElement.oninput = function(){
                    var errorElement = inputElement.parentElement.querySelector('.form-message'); 
                    errorElement.innerText = '';
                    inputElement.parentElement.classList.remove('invalid');
                }
            });
        });

    }
}

//định nghĩa rules
//nguyen tac cua cac rule:
//1. khi co loi -> trả message lỗi
//2.khi hop le ->khong tra ra ji ca

Validator.isEmail = function(selector,message){
    return{
            selector: selector,
            test: function(value){
                var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                return regex.test(value) ? undefined : message || 'Vui lòng nhập Email'
            }
        };
}

Validator.isRequired = function(selector,message){
    return{
        selector: selector,
        test: function(value){
            return value.trim() ? undefined :message || 'Vui lòng nhập họ và tên !!!'
        }
    };

}

Validator.isPhonnumber = function(selector,message){
    return{
        selector: selector,
        test: function(value){
            var phonenum = /^\d{10}$/
            return phonenum.test(value) ? undefined :message || 'Vui lòng nhập số điện thoại !!!'
        }
    };
}

Validator.minLength = function(selector,min,message){
    return{
            selector: selector,
            test: function(value){

                return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} kí tự !!!`;
            }
        };
}

Validator.isConfrimed = function(selector, getConfirmValue,message){
    return{
        selector : selector,
        test: function (value){
            return value === getConfirmValue() ? undefined :message || 'Giá trị nhập vào không chính xác !!!'
        }
    }
}

var infoAPI = 'http://localhost:3000/info';//link json

fetch(infoAPI,{method:"GET"})
    .then(function (response) {
        return response.json();
    })
    .then(function (info) {
        console.log(info);
    })


// .then(function(infoAPIs){
//     var htmls = infoAPIs.map(function(infoAPI){
//         return `<li>
//             <p>${infoAPI.email}</p>
//             <p>${infoAPI.name}</p>
//             <p>${infoAPI.phone}</p>
//             <p>${infoAPI.pass}</p>
//             <p>${infoAPI.repass}</p>
//         </li>`;
//         var html = htmls.join('')
//     })
// })
// .catch(function(err){
//     alert('error!!!');
// })

