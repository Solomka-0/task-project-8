<div>
    <h1>{{ $notifiable->name  }},</h1>
    <div>
        <p>Перейди по <a href="{{env('APP_URL') . '/users/confirm-setting/' . $confirmation->id . '/' . $confirmation->code}}">ссылке</a> для подтверждения</p>
    </div>
</div>
