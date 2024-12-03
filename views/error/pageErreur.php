<div class="min-h-[400px] flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4"><?= $_SESSION["pageErreur"] ["titre"] ?></h1>
        <p class="text-gray-600 mb-8">
            <?= $_SESSION["pageErreur"] ["message"] ?>
        </p>

        <div class="space-x-4">
            <a href="/" class="px-6 py-3 rounded-lg">
                Retour à l'accueil
            </a>

            <?php if (!is_null($_SESSION["pageErreur"] ["redirection"])) : ?>

            <a href="<?= $_SESSION["pageErreur"] ["redirection"] ["lien"] ?>" class="px-6 py-3 rounded-lg ms-5">
                <?= $_SESSION["pageErreur"] ["redirection"] ["message"] ?>
            </a>

            <?php endif; ?>
        </div>
    </div>
</div>