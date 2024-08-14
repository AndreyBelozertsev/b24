<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <script src="//api.bitrix24.com/api/v1/"></script>
    <title>Приложение</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        BX24.ready(async function () {
            await BX24.init(async function () {
                window.axios.defaults.headers.common['X-b24api-access-token'] = BX24.getAuth().access_token;
                window.axios.defaults.headers.common['X-b24api-domain'] = BX24.getAuth().domain;
                window.axios.defaults.headers.common['X-b24api-member-id'] = BX24.getAuth().member_id;
            });
        });
        BX24.callMethod('user.get', {sort:'ID',order:'ASC'}, function(result){
            if(result.error())
            {
                alert('Ошибка запроса: ' + result.error());
            }
            else
            {
                console.log(result.data());
                if(result.more())
                    result.next();
            }
        });
        Alpine.data('dropdown', () => ({
            open: false,
        
            toggle() {
                this.open = ! this.open
            }
        }))
    </script>
</head>
<body>
    <div class="bg-red-500">
        @dump(request())
        Приложение
        <div x-data="dropdown">
            <button @click="toggle">Expand</button>
        
            <span x-show="open">Content...</span>
        </div>
        
        <div x-data="dropdown">
            <button @click="toggle">Expand</button>
        
            <span x-show="open">Some Other Content...</span>
        </div>
    </div>
</body>

</html>
