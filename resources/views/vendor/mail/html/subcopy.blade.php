<table class="subcopy" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <!-- imagem -->
            <div class="subcopy-item">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td align="center" valign="top">
                            @auth()
                                <span class="avatar rounded-circle fe-img-center">
                                    <img src="{{ \App\Models\User\User::getPhoto(auth()->user()->photo) }}" alt="" width="50" border="0">
                                </span>
                            @endauth
                            @guest()
                                <span class="avatar rounded-circle fe-img-center">
                                    <img src="{{ asset('images/default/default-user.png') }}" alt="" width="50" border="0">
                                </span>
                            @endguest
                        </td>
                    </tr>
                </table>
            </div>

            <!-- texto -->
            <div class="subcopy-item">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td align="left" valign="top">
                            @auth()
                                @if (auth()->user()['name'] && auth()->user()['profession'])
                                    <span class="footer-text-1">{{ auth()->user()['name'] }}</span>
                                    <div class="space">&nbsp;</div>
                                    <span class="footer-text-2">{{ auth()->user()['profession'] }}</span>
                                @else
                                    <div class="footer-text-1">{{ auth()->user()['name'] }}</div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                    <div class="space"> </div>
                                @endif
                            @endauth
                            @guest()
                                <span class="footer-text-1">{{ config('app.name', 'Codintop') }}</span>
                                <div class="space">&nbsp;</div>
                                <span class="footer-text-2">Desenvolvido por <a class="no-link" href="http://www.codintop.com/" target="_blank">Codintop</a></span>
                            @endguest
                        </td>
                    </tr>
                </table>
                <div class="space">&nbsp;</div>
                <div class="space">&nbsp;</div>
                <div class="space">&nbsp;</div>
            </div>
            <div class="space-max">&nbsp;</div>

            {{ Illuminate\Mail\Markdown::parse($slot) }}
        </td>
    </tr>
</table>
