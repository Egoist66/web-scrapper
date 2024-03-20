document.addEventListener('alpine:init', () => {
    Alpine.data('data', () => ({
        url: '',
        async parseRequest() {
            if (!this.checkUrlField()) {
                return;
            }

            const response = await fetch('index.php?page=home&action=create', {
                method: 'POST',
                body: new FormData(document.querySelector('#parser-form'))
            })
            const res = await response.json()
            if(res){
                console.log(res)
                const timer = setTimeout(() => {
                        window.location.reload()
                    clearTimeout(timer)
                }, 500)
            }


        },

        checkUrlField() {
            if (!this.url.length) {
                document.querySelector('[x-ref="urlField"]').focus();
                document.querySelector('[x-ref="urlField"]').placeholder = 'Пустой URL!';
                return false
            } else {
                document.querySelector('[x-ref="urlField"]').blur();
                return true
            }
        }
    }))

})