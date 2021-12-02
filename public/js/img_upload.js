/************** XU LY LOGIC INPUT********** */
function Validator(option) {
    var SelectorRules = {};

    function validate(inputElement, rule) {
        var errInput;
        var errElement = inputElement.parentElement.querySelector(option.errSelector);
        var rules = SelectorRules[rule.selector];
        for (var i = 0; i < rules.length; ++i) {
            errInput = rules[i](inputElement.value);
            if (errInput) break;
        }
        if (errInput) {
            errElement.innerText = errInput;
            inputElement.classList.add('valid_err');
        } else {
            errElement.innerText = '';
            inputElement.classList.remove('valid_err');
        }
        return !errInput;
    }

    var formElement = document.querySelector(option.form);
    if (formElement) {
        formElement.onsubmit = function(e) {
            e.preventDefault();
            //kiểm tra điền form hoàn thành
            var isFormDone = true;
            option.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isDone = validate(inputElement, rule);
                if (!isDone) {
                    isFormDone = false;
                }
            });
            if (isFormDone) {
                if (typeof(option.Onsubmit) === 'function') {
                    var readInputs = formElement.querySelectorAll('[name]');
                    // console.log(readInputs);
                    var formValues = Array.from(readInputs).reduce(function(values, input) {
                        if (input.type == 'file') {
                            values[input.name] = input.files;
                        } else {
                            values[input.name] = input.value;

                        }
                        return values;
                    }, {});
                    option.Onsubmit(formValues);
                }

            }
        }
        option.rules.forEach(function(rule) {
            if (Array.isArray(SelectorRules)) {
                SelectorRules[rule.selector].push(rule.test);
            } else {
                SelectorRules[rule.selector] = [rule.test];
            }
            var inputElement = formElement.querySelector(rule.selector);


            if (inputElement) {
                inputElement.onblur = function() {
                    validate(inputElement, rule);
                }
                inputElement.oninput = function() {
                    var errElement = inputElement.parentElement.querySelector(option.errSelector);
                    errElement.innerText = '';
                    inputElement.classList.remove('valid_err');
                }
            }
        });
    }
}
Validator.isValue = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : 'Vui lòng nhập thông tin vào trường này!';
        }
    };
};

Validator.isMoney = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^[0-9]+$/;
            return regex.test(value) ? undefined : 'Vui lòng nhập số !';
        }
    };
}
Validator.isMail = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regex.test(value) ? undefined : 'Vui lòng nhập mail!';
        }
    };
}