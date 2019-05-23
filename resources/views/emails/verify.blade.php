@component('mail::message')

# 欢迎注册使用 Laravel

点击下面按钮进行激活。

@component('mail::button', ['url' => 'http://www.laravel.com'])

激活

@endcomponent

Thanks,<br>

{{ config('app.name') }}

@endcomponent
