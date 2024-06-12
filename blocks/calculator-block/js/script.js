(function ($) {
    $(document).ready(() => {
        let calculations = '';
        let result = '';

        const updateDisplay = () => {
            $('.calculator__calculations').text(calculations || '0');
            $('.calculator__result').text(result);
        };

        const clearCalculator = () => {
            calculations = '';
            result = '';
            updateDisplay();
        };

        const calculateResult = () => {
            try {
                calculations = calculations.replace(/[^0-9+\-*/.]/g, '');
                result = math.evaluate(calculations);
                if (result === Infinity || result === -Infinity || isNaN(result)) {
                    throw new Error('Invalid operation');
                }
                updateDisplay();
            } catch (error) {
                console.error(error.message);
                result = 'Error';
                updateDisplay();
            }
        };

        $('.calculator__buttonRow__button').on('click', function () {
            const value = window.getComputedStyle(this, '::before').getPropertyValue('content').replaceAll('"','');

            if ($(this).hasClass('button_cancel')) {
                clearCalculator();
            } else if ($(this).hasClass('button_result')) {
                calculateResult();
            } else if ($(this).hasClass('button_save')) {
                storeToFile();
            } else if (/[\d/*\-+]/.test(value)) {
                calculations += value;
                updateDisplay();
            }
        });

        $(document).on('keydown', function (e) {
            try {
                if (e.key === 'Enter') {
                    calculateResult();
                } else if (e.key === 'Escape') {
                    clearCalculator();
                } else if (/[\d/*\-+]/.test(e.key)) {
                    calculations += e.key;
                    updateDisplay();
                } else if (e.key === 'Backspace') {
                    calculations = calculations.slice(0, -1);
                    updateDisplay();
                }
            } catch (error) {
                console.error(error.message);
                result = 'Error';
                updateDisplay();
            }
        });

        const storeToFile = async () => {
            const userIP = await getUserIP(); 
            const dataArray = {
                'calculations': calculations,
                'result': result,
                'date': new Date().toISOString(),
                'ip': userIP
            };
        
            try {
                const response = await fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(dataArray)
                });
        
                if (!response.ok) {
                    throw new Error('Network response was not ok' + response.statusText);
                }
        
                const responseData = await response.json();
                console.log('Success:', responseData);
            } catch (error) {
                console.error('Error:', error);
            }
        };

        const getUserIP = async () => {
            try {
                const response = await fetch('https://api.bigdatacloud.net/data/client-ip');
                const data = await response.json();
                return data.ipString;
            } catch (error) {
                console.error('Error fetching IP address:', error);
                return '127.0.0.1';
            }
        };

        updateDisplay();
    }); 
})(jQuery);