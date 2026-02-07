<?= $this->extend('templates/layout-two'); ?>

<?= $this->section('content') ?>

<style>
    body {
        background-image: url('https://thumbs.dreamstime.com/b/smart-warehouse-inventory-management-system-358666963.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        position: relative;
    }
    
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(171, 200, 245, 0.75) 0%, rgba(214, 233, 255, 0.75) 100%);
        pointer-events: none;
        z-index: 0;
    }
    
    * {
        transition: all 0.3s ease;
    }
    
    @keyframes borderRotate {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
    }
    
    .animated-form {
        position: relative;
        background: white;
        border-radius: 1rem;
        z-index: 10;
    }
    
    .animated-form::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(90deg, #3B82F6, #0EA5E9, #2563EB, #3B82F6);
        background-size: 300% 300%;
        border-radius: 1rem;
        animation: borderRotate 3s ease infinite;
        z-index: -1;
    }
    
    .form-content {
        position: relative;
        background: white;
        border-radius: 1rem;
        padding: 2rem;
    }
    
    .login-container {
        position: relative;
        z-index: 10;
    }
</style>

<div class="min-h-screen flex items-center justify-center px-4 login-container">

    <div class="w-full max-w-md animated-form shadow-2xl">
        <div class="form-content">

        <!-- LOGO -->
        <div class="flex justify-center mb-8">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full blur-lg opacity-30"></div>
                <img 
                    src="<?= base_url('img/logo.svg') ?>" 
                    alt="Logo SGi" 
                    class="h-16 relative"
                >
            </div>
        </div>

        <!-- Títulos -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-black mb-3 bg-gradient-to-r from-[#3B82F6] via-[#0EA5E9] to-[#00D9FF] bg-clip-text text-transparent">
                <?= lang('Auth.login') ?>
            </h1>
            <div class="h-1 w-20 mx-auto bg-gradient-to-r from-[#3B82F6] to-[#0EA5E9] rounded-full mb-4"></div>
            <p class="text-gray-600 font-semibold text-lg flex items-center justify-center gap-2">
                <svg class="w-5 h-5 text-[#0EA5E9]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                Sistema de Gestión de Inventario
            </p>
        </div>

        <!-- ERRORES -->
        <?php if (session('error') !== null) : ?>
            <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-400 text-red-700 rounded-lg text-sm font-medium">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                    <?= esc(session('error')) ?>
                </div>
            </div>
        <?php elseif (session('errors') !== null) : ?>
            <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-400 text-red-700 rounded-lg text-sm font-medium">
                <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                            <?= esc($error) ?>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                        <?= esc(session('errors')) ?>
                    </div>
                <?php endif ?>
            </div>
        <?php endif ?>

        <!-- MENSAJE -->
        <?php if (session('message') !== null) : ?>
            <div class="mb-4 p-4 bg-emerald-50 border-l-4 border-emerald-400 text-emerald-700 rounded-lg text-sm font-medium flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                <?= esc(session('message')) ?>
            </div>
        <?php endif ?>

        <form action="<?= url_to('login') ?>" method="post" class="space-y-6">
            <?= csrf_field() ?>

            <!-- Email -->
            <div>
                <label class="block text-sm font-bold text-gray-800 mb-3 uppercase tracking-wide">
                    <svg class="w-4 h-4 inline-block mr-1 text-[#3B82F6]" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <?= lang('Auth.email') ?>
                </label>
                <input
                    type="email"
                    name="email"
                    value="<?= old('email') ?>"
                    required
                    placeholder="correo@empresa.com"
                    class="w-full px-4 py-3 rounded-xl border-2 border-blue-100 bg-blue-50 focus:outline-none focus:border-[#3B82F6] focus:ring-2 focus:ring-blue-300 focus:bg-white font-medium text-gray-700 placeholder-gray-400 transition-all duration-300"
                >
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-bold text-gray-800 mb-3 uppercase tracking-wide">
                    <svg class="w-4 h-4 inline-block mr-1 text-[#0EA5E9]" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5s-5 2.24-5 5v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
                    <?= lang('Auth.password') ?>
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    placeholder="Contraseña segura"
                    class="w-full px-4 py-3 rounded-xl border-2 border-cyan-100 bg-cyan-50 focus:outline-none focus:border-[#0EA5E9] focus:ring-2 focus:ring-cyan-300 focus:bg-white font-medium text-gray-700 placeholder-gray-400 transition-all duration-300"
                >
            </div>

            <!-- BOTÓN -->
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-[#3B82F6] via-[#0EA5E9] to-[#2563EB] hover:from-[#2563EB] hover:via-[#00D9FF] hover:to-[#1D4ED8] text-white font-bold py-3 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2 text-lg"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                <?= lang('Auth.login') ?>
            </button>
        </form>
        </div>

    </div>

</div>

<?= $this->endSection() ?>
