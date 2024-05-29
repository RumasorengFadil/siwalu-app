<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['public/css/main.scss','public/js/addLaundry.js'])
</head>
<body>
    <header>
        <nav class="nav">
            <div class="nav__logo-cn">
                <a href="{{url("/")}}">
                    <img class="nav__logo" src="/img/logo.svg" alt="">
                </a>
                <h1 class="nav__brand-name">Siwalu</h1>
            </div>
        </nav>
    </header>

    <main>
        <div class="profile">
            <div class="profile__container">
                <div style="width:100%;padding:15px">
                    <h1 class="profile__title">Profile</h1>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('updatePhoto.post') }}">
                        @csrf
                        <label for="gambar">
                            @if ($user->photo != null)
                                <img src="/uploads/{{ $user->photo }}" alt="" class="profile__img form__image-placeholder">
                            @else
                                <img src="/icn/default_pfp.svg" alt="" class="profile__img form__image-placeholder ">
                            @endif
                        </label>
                        <!-- Input file -->
                        <input class="form__input-file" type="file" id="gambar" name="gambar" accept="image/*"
                            style="display: none;">
                        <label class="error" for="">{{ $errors->first('gambar') }}</label>
                        
                        <input class="form__submit-btn form__submit-btn-sm" type="submit" value="Ubah">
                    </form>
                    <h1 class="profile__name">{{ $user->name }}</h1>
                    <h3 class="profile__email">{{ $user->email }}</h3>
                    <p class="profile__text">Bergabung sejak {{ $user->created_at->format('d F Y') }}</p>
                    <p class="profile__text">*Maksimal foto diupload 2mb</p>
                </div>
            </div>
            <div class="profile__container">
                <div style="width:100%;padding:15px">
                    <h1 class="profile__title">Edit</h1>
                    <div class="profile__navbar">
                        <label for="" class="profile__navtitle profile-label">Profile</label>
                        <label for="" class="profile__navtitle password-label">Password</label>
                    </div>
                    <div class="profile__edit">
                        <form action="{{ route('updateUsername.post') }}" method="POST" class="profile__form form-profile">
                            @csrf
                            <div class="profile__form-element">
                                <label for="input-username" class="profile__form-label">Username</label>
                                <input type="text" id="inputUsername" name="username" value="{{ $user->name }}" class="profile__form-input profile__icn-user" 
                                placeholder="username"> 
                                <label class="error" for="">{{ $errors->first('username') }}</label>
                            </div>
                            {{-- <div class="profile__form-element">
                                <label for="" class="profile__form-label">Email</label>
                                <input type="text" class="profile__form-input">
                            </div> --}}
                            <input class="form__submit-btn form__submit-btn-sm" type="submit" value="Simpan">
                        </form>
                        <form action="{{ route('updatePassword.post') }}" method="POST" class="profile__form form-password hidden">
                            @csrf
                            <div class="profile__form-element">
                                <label for="" class="profile__form-label" >Old Password</label>
                                <input type="text" id="inputOldPassword" name="oldPassword" class="profile__form-input profile__icn-password" placeholder="old password">
                                <label class="error" for="">{{ $errors->first('oldPassword') }}</label>
                            </div>
                            <div class="profile__form-element">
                                <label for="" class="profile__form-label">New Password</label>
                                <input type="text" id="inputNewPassword" name="newPassword" class="profile__form-input profile__icn-password" placeholder="new password">
                                <label class="error" for="">{{ $errors->first('newPassword') }}</label>
                            </div>
                            <input class="form__submit-btn form__submit-btn-sm" type="submit" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const profileLabel = document.querySelector(".profile-label")
        const passwordLabel = document.querySelector(".password-label")
        const profileForm = document.querySelector(".form-profile")
        const passwordForm = document.querySelector(".form-password")
        function showForm(e) {
            if (passwordForm.classList.contains("hidden")){
                passwordForm.classList.remove("hidden")
                profileForm.classList.add("hidden");  
            }else{
                profileForm.classList.remove("hidden")
                passwordForm.classList.add("hidden"); 
            }
        }
        profileLabel.addEventListener("click", showForm);
        passwordLabel.addEventListener("click", showForm);
    </script>
</body>
</html>