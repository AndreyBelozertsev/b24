<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <script src="//api.bitrix24.com/api/v1/"></script>
    <title>Приложение</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        BX24.ready(async function () {
            await BX24.init(async function () {
                window.axios.defaults.headers.common['X-b24api-access-token'] = BX24.getAuth().access_token;
                window.axios.defaults.headers.common['X-b24api-domain'] = BX24.getAuth().domain;
                window.axios.defaults.headers.common['X-b24api-member-id'] = BX24.getAuth().member_id;
            });
        });
    </script>
</head>
<body>
    <div id="app">
        Это момент истины, момент начала грандиозного пути. 
        Один маленький шаг в масштабе ИТ экосистемы, но громадный шаг в сторону достижения великой цели!
    </div>
</body>
</html>
