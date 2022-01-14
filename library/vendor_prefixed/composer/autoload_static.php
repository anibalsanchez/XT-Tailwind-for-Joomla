<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit18e45a975f2d349cc3c1ab3731913c78
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        '72579e7bd17821bb1321b87411366eae' => __DIR__ . '/..' . '/illuminate/support/helpers.php',
        '863138ee88c6eb9708842b2b9a17d347' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/ClassAliasMap.php',
        'd80ee2be462313c94393e850d515fd92' => __DIR__ . '/..' . '/extly/xt-renderers-for-joomla/src/ClassAliasMap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Studiow\\HTML\\' => 13,
        ),
        'I' => 
        array (
            'Illuminate\\Support\\' => 19,
            'Illuminate\\Contracts\\' => 21,
        ),
        'E' => 
        array (
            'Extly\\Infrastructure\\Creator\\' => 29,
            'Extly\\CMS\\Document\\Renderer\\Html\\' => 33,
            'Extly\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Studiow\\HTML\\' => 
        array (
            0 => __DIR__ . '/..' . '/studiow/html/src',
        ),
        'Illuminate\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/support',
        ),
        'Illuminate\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/contracts',
        ),
        'Extly\\Infrastructure\\Creator\\' => 
        array (
            0 => __DIR__ . '/..' . '/anibalsanchez/create-pattern/src',
        ),
        'Extly\\CMS\\Document\\Renderer\\Html\\' => 
        array (
            0 => __DIR__ . '/..' . '/extly/xt-renderers-for-joomla/src',
        ),
        'Extly\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/library/src',
            1 => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
        ),
        'C' => 
        array (
            'Composer\\CustomDirectoryInstaller' => 
            array (
                0 => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\CustomDirectoryInstaller\\LibraryInstaller' => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src/Composer/CustomDirectoryInstaller/LibraryInstaller.php',
        'Composer\\CustomDirectoryInstaller\\LibraryPlugin' => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src/Composer/CustomDirectoryInstaller/LibraryPlugin.php',
        'Composer\\CustomDirectoryInstaller\\PackageUtils' => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src/Composer/CustomDirectoryInstaller/PackageUtils.php',
        'Composer\\CustomDirectoryInstaller\\PearInstaller' => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src/Composer/CustomDirectoryInstaller/PearInstaller.php',
        'Composer\\CustomDirectoryInstaller\\PearPlugin' => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src/Composer/CustomDirectoryInstaller/PearPlugin.php',
        'Composer\\CustomDirectoryInstaller\\PluginInstaller' => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src/Composer/CustomDirectoryInstaller/PluginInstaller.php',
        'Composer\\CustomDirectoryInstaller\\PluginPlugin' => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src/Composer/CustomDirectoryInstaller/PluginPlugin.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Doctrine\\Common\\Inflector\\Inflector' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Common/Inflector/Inflector.php',
        'Extly\\CMS\\Document\\Renderer\\Html\\XTHtmlAssetsBodyRenderer' => __DIR__ . '/..' . '/extly/xt-renderers-for-joomla/src/XTHtmlAssetsBodyRenderer.php',
        'Extly\\CMS\\Document\\Renderer\\Html\\XTHtmlAssetsRenderer' => __DIR__ . '/..' . '/extly/xt-renderers-for-joomla/src/XTHtmlAssetsRenderer.php',
        'Extly\\Infrastructure\\Creator\\CreatorTrait' => __DIR__ . '/..' . '/anibalsanchez/create-pattern/src/CreatorTrait.php',
        'Extly\\Infrastructure\\Creator\\SingletonTrait' => __DIR__ . '/..' . '/anibalsanchez/create-pattern/src/SingletonTrait.php',
        'Extly\\Infrastructure\\Service\\Cms\\Joomla\\ScriptHelper' => __DIR__ . '/../../..' . '/library/src/Infrastructure/Service/Cms/Joomla/ScriptHelper.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\AssetCollection' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/AssetCollection.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\HtmlAssetTagAbstract' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/HtmlAssetTagAbstract.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\HtmlAssetTagInterface' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/HtmlAssetTagInterface.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\InlineScriptTag' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/InlineScriptTag.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\InlineStyleTag' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/InlineStyleTag.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\LinkCriticalStylesheetTag' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/LinkCriticalStylesheetTag.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\LinkDeferStylesheetTag' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/LinkDeferStylesheetTag.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\LinkStylesheetByMediaPrint' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/LinkStylesheetByMediaPrint.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\LinkStylesheetByPreloadAsStyle' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/LinkStylesheetByPreloadAsStyle.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\LinkStylesheetByScript' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/LinkStylesheetByScript.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\LinkStylesheetTag' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/LinkStylesheetTag.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Asset\\ScriptTag' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Asset/ScriptTag.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\HtmlAssetTagsBuilder' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/HtmlAssetTagsBuilder.php',
        'Extly\\Infrastructure\\Support\\HtmlAsset\\Repository' => __DIR__ . '/..' . '/anibalsanchez/extly-html-asset-tags-builder/src/Infrastructure/Support/HtmlAsset/Repository.php',
        'Illuminate\\Contracts\\Auth\\Access\\Authorizable' => __DIR__ . '/..' . '/illuminate/contracts/Auth/Access/Authorizable.php',
        'Illuminate\\Contracts\\Auth\\Access\\Gate' => __DIR__ . '/..' . '/illuminate/contracts/Auth/Access/Gate.php',
        'Illuminate\\Contracts\\Auth\\Authenticatable' => __DIR__ . '/..' . '/illuminate/contracts/Auth/Authenticatable.php',
        'Illuminate\\Contracts\\Auth\\CanResetPassword' => __DIR__ . '/..' . '/illuminate/contracts/Auth/CanResetPassword.php',
        'Illuminate\\Contracts\\Auth\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Auth/Factory.php',
        'Illuminate\\Contracts\\Auth\\Guard' => __DIR__ . '/..' . '/illuminate/contracts/Auth/Guard.php',
        'Illuminate\\Contracts\\Auth\\PasswordBroker' => __DIR__ . '/..' . '/illuminate/contracts/Auth/PasswordBroker.php',
        'Illuminate\\Contracts\\Auth\\PasswordBrokerFactory' => __DIR__ . '/..' . '/illuminate/contracts/Auth/PasswordBrokerFactory.php',
        'Illuminate\\Contracts\\Auth\\StatefulGuard' => __DIR__ . '/..' . '/illuminate/contracts/Auth/StatefulGuard.php',
        'Illuminate\\Contracts\\Auth\\SupportsBasicAuth' => __DIR__ . '/..' . '/illuminate/contracts/Auth/SupportsBasicAuth.php',
        'Illuminate\\Contracts\\Auth\\UserProvider' => __DIR__ . '/..' . '/illuminate/contracts/Auth/UserProvider.php',
        'Illuminate\\Contracts\\Broadcasting\\Broadcaster' => __DIR__ . '/..' . '/illuminate/contracts/Broadcasting/Broadcaster.php',
        'Illuminate\\Contracts\\Broadcasting\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Broadcasting/Factory.php',
        'Illuminate\\Contracts\\Broadcasting\\ShouldBroadcast' => __DIR__ . '/..' . '/illuminate/contracts/Broadcasting/ShouldBroadcast.php',
        'Illuminate\\Contracts\\Broadcasting\\ShouldBroadcastNow' => __DIR__ . '/..' . '/illuminate/contracts/Broadcasting/ShouldBroadcastNow.php',
        'Illuminate\\Contracts\\Bus\\Dispatcher' => __DIR__ . '/..' . '/illuminate/contracts/Bus/Dispatcher.php',
        'Illuminate\\Contracts\\Bus\\QueueingDispatcher' => __DIR__ . '/..' . '/illuminate/contracts/Bus/QueueingDispatcher.php',
        'Illuminate\\Contracts\\Cache\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Cache/Factory.php',
        'Illuminate\\Contracts\\Cache\\Repository' => __DIR__ . '/..' . '/illuminate/contracts/Cache/Repository.php',
        'Illuminate\\Contracts\\Cache\\Store' => __DIR__ . '/..' . '/illuminate/contracts/Cache/Store.php',
        'Illuminate\\Contracts\\Config\\Repository' => __DIR__ . '/..' . '/illuminate/contracts/Config/Repository.php',
        'Illuminate\\Contracts\\Console\\Application' => __DIR__ . '/..' . '/illuminate/contracts/Console/Application.php',
        'Illuminate\\Contracts\\Console\\Kernel' => __DIR__ . '/..' . '/illuminate/contracts/Console/Kernel.php',
        'Illuminate\\Contracts\\Container\\BindingResolutionException' => __DIR__ . '/..' . '/illuminate/contracts/Container/BindingResolutionException.php',
        'Illuminate\\Contracts\\Container\\Container' => __DIR__ . '/..' . '/illuminate/contracts/Container/Container.php',
        'Illuminate\\Contracts\\Container\\ContextualBindingBuilder' => __DIR__ . '/..' . '/illuminate/contracts/Container/ContextualBindingBuilder.php',
        'Illuminate\\Contracts\\Cookie\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Cookie/Factory.php',
        'Illuminate\\Contracts\\Cookie\\QueueingFactory' => __DIR__ . '/..' . '/illuminate/contracts/Cookie/QueueingFactory.php',
        'Illuminate\\Contracts\\Database\\ModelIdentifier' => __DIR__ . '/..' . '/illuminate/contracts/Database/ModelIdentifier.php',
        'Illuminate\\Contracts\\Debug\\ExceptionHandler' => __DIR__ . '/..' . '/illuminate/contracts/Debug/ExceptionHandler.php',
        'Illuminate\\Contracts\\Encryption\\DecryptException' => __DIR__ . '/..' . '/illuminate/contracts/Encryption/DecryptException.php',
        'Illuminate\\Contracts\\Encryption\\EncryptException' => __DIR__ . '/..' . '/illuminate/contracts/Encryption/EncryptException.php',
        'Illuminate\\Contracts\\Encryption\\Encrypter' => __DIR__ . '/..' . '/illuminate/contracts/Encryption/Encrypter.php',
        'Illuminate\\Contracts\\Events\\Dispatcher' => __DIR__ . '/..' . '/illuminate/contracts/Events/Dispatcher.php',
        'Illuminate\\Contracts\\Filesystem\\Cloud' => __DIR__ . '/..' . '/illuminate/contracts/Filesystem/Cloud.php',
        'Illuminate\\Contracts\\Filesystem\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Filesystem/Factory.php',
        'Illuminate\\Contracts\\Filesystem\\FileNotFoundException' => __DIR__ . '/..' . '/illuminate/contracts/Filesystem/FileNotFoundException.php',
        'Illuminate\\Contracts\\Filesystem\\Filesystem' => __DIR__ . '/..' . '/illuminate/contracts/Filesystem/Filesystem.php',
        'Illuminate\\Contracts\\Foundation\\Application' => __DIR__ . '/..' . '/illuminate/contracts/Foundation/Application.php',
        'Illuminate\\Contracts\\Hashing\\Hasher' => __DIR__ . '/..' . '/illuminate/contracts/Hashing/Hasher.php',
        'Illuminate\\Contracts\\Http\\Kernel' => __DIR__ . '/..' . '/illuminate/contracts/Http/Kernel.php',
        'Illuminate\\Contracts\\Logging\\Log' => __DIR__ . '/..' . '/illuminate/contracts/Logging/Log.php',
        'Illuminate\\Contracts\\Mail\\MailQueue' => __DIR__ . '/..' . '/illuminate/contracts/Mail/MailQueue.php',
        'Illuminate\\Contracts\\Mail\\Mailable' => __DIR__ . '/..' . '/illuminate/contracts/Mail/Mailable.php',
        'Illuminate\\Contracts\\Mail\\Mailer' => __DIR__ . '/..' . '/illuminate/contracts/Mail/Mailer.php',
        'Illuminate\\Contracts\\Notifications\\Dispatcher' => __DIR__ . '/..' . '/illuminate/contracts/Notifications/Dispatcher.php',
        'Illuminate\\Contracts\\Notifications\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Notifications/Factory.php',
        'Illuminate\\Contracts\\Pagination\\LengthAwarePaginator' => __DIR__ . '/..' . '/illuminate/contracts/Pagination/LengthAwarePaginator.php',
        'Illuminate\\Contracts\\Pagination\\Paginator' => __DIR__ . '/..' . '/illuminate/contracts/Pagination/Paginator.php',
        'Illuminate\\Contracts\\Pipeline\\Hub' => __DIR__ . '/..' . '/illuminate/contracts/Pipeline/Hub.php',
        'Illuminate\\Contracts\\Pipeline\\Pipeline' => __DIR__ . '/..' . '/illuminate/contracts/Pipeline/Pipeline.php',
        'Illuminate\\Contracts\\Queue\\EntityNotFoundException' => __DIR__ . '/..' . '/illuminate/contracts/Queue/EntityNotFoundException.php',
        'Illuminate\\Contracts\\Queue\\EntityResolver' => __DIR__ . '/..' . '/illuminate/contracts/Queue/EntityResolver.php',
        'Illuminate\\Contracts\\Queue\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Queue/Factory.php',
        'Illuminate\\Contracts\\Queue\\Job' => __DIR__ . '/..' . '/illuminate/contracts/Queue/Job.php',
        'Illuminate\\Contracts\\Queue\\Monitor' => __DIR__ . '/..' . '/illuminate/contracts/Queue/Monitor.php',
        'Illuminate\\Contracts\\Queue\\Queue' => __DIR__ . '/..' . '/illuminate/contracts/Queue/Queue.php',
        'Illuminate\\Contracts\\Queue\\QueueableCollection' => __DIR__ . '/..' . '/illuminate/contracts/Queue/QueueableCollection.php',
        'Illuminate\\Contracts\\Queue\\QueueableEntity' => __DIR__ . '/..' . '/illuminate/contracts/Queue/QueueableEntity.php',
        'Illuminate\\Contracts\\Queue\\ShouldQueue' => __DIR__ . '/..' . '/illuminate/contracts/Queue/ShouldQueue.php',
        'Illuminate\\Contracts\\Redis\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Redis/Factory.php',
        'Illuminate\\Contracts\\Routing\\BindingRegistrar' => __DIR__ . '/..' . '/illuminate/contracts/Routing/BindingRegistrar.php',
        'Illuminate\\Contracts\\Routing\\Registrar' => __DIR__ . '/..' . '/illuminate/contracts/Routing/Registrar.php',
        'Illuminate\\Contracts\\Routing\\ResponseFactory' => __DIR__ . '/..' . '/illuminate/contracts/Routing/ResponseFactory.php',
        'Illuminate\\Contracts\\Routing\\UrlGenerator' => __DIR__ . '/..' . '/illuminate/contracts/Routing/UrlGenerator.php',
        'Illuminate\\Contracts\\Routing\\UrlRoutable' => __DIR__ . '/..' . '/illuminate/contracts/Routing/UrlRoutable.php',
        'Illuminate\\Contracts\\Session\\Session' => __DIR__ . '/..' . '/illuminate/contracts/Session/Session.php',
        'Illuminate\\Contracts\\Support\\Arrayable' => __DIR__ . '/..' . '/illuminate/contracts/Support/Arrayable.php',
        'Illuminate\\Contracts\\Support\\Htmlable' => __DIR__ . '/..' . '/illuminate/contracts/Support/Htmlable.php',
        'Illuminate\\Contracts\\Support\\Jsonable' => __DIR__ . '/..' . '/illuminate/contracts/Support/Jsonable.php',
        'Illuminate\\Contracts\\Support\\MessageBag' => __DIR__ . '/..' . '/illuminate/contracts/Support/MessageBag.php',
        'Illuminate\\Contracts\\Support\\MessageProvider' => __DIR__ . '/..' . '/illuminate/contracts/Support/MessageProvider.php',
        'Illuminate\\Contracts\\Support\\Renderable' => __DIR__ . '/..' . '/illuminate/contracts/Support/Renderable.php',
        'Illuminate\\Contracts\\Translation\\Translator' => __DIR__ . '/..' . '/illuminate/contracts/Translation/Translator.php',
        'Illuminate\\Contracts\\Validation\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/Validation/Factory.php',
        'Illuminate\\Contracts\\Validation\\ValidatesWhenResolved' => __DIR__ . '/..' . '/illuminate/contracts/Validation/ValidatesWhenResolved.php',
        'Illuminate\\Contracts\\Validation\\Validator' => __DIR__ . '/..' . '/illuminate/contracts/Validation/Validator.php',
        'Illuminate\\Contracts\\View\\Factory' => __DIR__ . '/..' . '/illuminate/contracts/View/Factory.php',
        'Illuminate\\Contracts\\View\\View' => __DIR__ . '/..' . '/illuminate/contracts/View/View.php',
        'Illuminate\\Support\\AggregateServiceProvider' => __DIR__ . '/..' . '/illuminate/support/AggregateServiceProvider.php',
        'Illuminate\\Support\\Arr' => __DIR__ . '/..' . '/illuminate/support/Arr.php',
        'Illuminate\\Support\\Collection' => __DIR__ . '/..' . '/illuminate/support/Collection.php',
        'Illuminate\\Support\\Composer' => __DIR__ . '/..' . '/illuminate/support/Composer.php',
        'Illuminate\\Support\\Debug\\Dumper' => __DIR__ . '/..' . '/illuminate/support/Debug/Dumper.php',
        'Illuminate\\Support\\Debug\\HtmlDumper' => __DIR__ . '/..' . '/illuminate/support/Debug/HtmlDumper.php',
        'Illuminate\\Support\\Facades\\App' => __DIR__ . '/..' . '/illuminate/support/Facades/App.php',
        'Illuminate\\Support\\Facades\\Artisan' => __DIR__ . '/..' . '/illuminate/support/Facades/Artisan.php',
        'Illuminate\\Support\\Facades\\Auth' => __DIR__ . '/..' . '/illuminate/support/Facades/Auth.php',
        'Illuminate\\Support\\Facades\\Blade' => __DIR__ . '/..' . '/illuminate/support/Facades/Blade.php',
        'Illuminate\\Support\\Facades\\Broadcast' => __DIR__ . '/..' . '/illuminate/support/Facades/Broadcast.php',
        'Illuminate\\Support\\Facades\\Bus' => __DIR__ . '/..' . '/illuminate/support/Facades/Bus.php',
        'Illuminate\\Support\\Facades\\Cache' => __DIR__ . '/..' . '/illuminate/support/Facades/Cache.php',
        'Illuminate\\Support\\Facades\\Config' => __DIR__ . '/..' . '/illuminate/support/Facades/Config.php',
        'Illuminate\\Support\\Facades\\Cookie' => __DIR__ . '/..' . '/illuminate/support/Facades/Cookie.php',
        'Illuminate\\Support\\Facades\\Crypt' => __DIR__ . '/..' . '/illuminate/support/Facades/Crypt.php',
        'Illuminate\\Support\\Facades\\DB' => __DIR__ . '/..' . '/illuminate/support/Facades/DB.php',
        'Illuminate\\Support\\Facades\\Event' => __DIR__ . '/..' . '/illuminate/support/Facades/Event.php',
        'Illuminate\\Support\\Facades\\Facade' => __DIR__ . '/..' . '/illuminate/support/Facades/Facade.php',
        'Illuminate\\Support\\Facades\\File' => __DIR__ . '/..' . '/illuminate/support/Facades/File.php',
        'Illuminate\\Support\\Facades\\Gate' => __DIR__ . '/..' . '/illuminate/support/Facades/Gate.php',
        'Illuminate\\Support\\Facades\\Hash' => __DIR__ . '/..' . '/illuminate/support/Facades/Hash.php',
        'Illuminate\\Support\\Facades\\Input' => __DIR__ . '/..' . '/illuminate/support/Facades/Input.php',
        'Illuminate\\Support\\Facades\\Lang' => __DIR__ . '/..' . '/illuminate/support/Facades/Lang.php',
        'Illuminate\\Support\\Facades\\Log' => __DIR__ . '/..' . '/illuminate/support/Facades/Log.php',
        'Illuminate\\Support\\Facades\\Mail' => __DIR__ . '/..' . '/illuminate/support/Facades/Mail.php',
        'Illuminate\\Support\\Facades\\Notification' => __DIR__ . '/..' . '/illuminate/support/Facades/Notification.php',
        'Illuminate\\Support\\Facades\\Password' => __DIR__ . '/..' . '/illuminate/support/Facades/Password.php',
        'Illuminate\\Support\\Facades\\Queue' => __DIR__ . '/..' . '/illuminate/support/Facades/Queue.php',
        'Illuminate\\Support\\Facades\\Redirect' => __DIR__ . '/..' . '/illuminate/support/Facades/Redirect.php',
        'Illuminate\\Support\\Facades\\Redis' => __DIR__ . '/..' . '/illuminate/support/Facades/Redis.php',
        'Illuminate\\Support\\Facades\\Request' => __DIR__ . '/..' . '/illuminate/support/Facades/Request.php',
        'Illuminate\\Support\\Facades\\Response' => __DIR__ . '/..' . '/illuminate/support/Facades/Response.php',
        'Illuminate\\Support\\Facades\\Route' => __DIR__ . '/..' . '/illuminate/support/Facades/Route.php',
        'Illuminate\\Support\\Facades\\Schema' => __DIR__ . '/..' . '/illuminate/support/Facades/Schema.php',
        'Illuminate\\Support\\Facades\\Session' => __DIR__ . '/..' . '/illuminate/support/Facades/Session.php',
        'Illuminate\\Support\\Facades\\Storage' => __DIR__ . '/..' . '/illuminate/support/Facades/Storage.php',
        'Illuminate\\Support\\Facades\\URL' => __DIR__ . '/..' . '/illuminate/support/Facades/URL.php',
        'Illuminate\\Support\\Facades\\Validator' => __DIR__ . '/..' . '/illuminate/support/Facades/Validator.php',
        'Illuminate\\Support\\Facades\\View' => __DIR__ . '/..' . '/illuminate/support/Facades/View.php',
        'Illuminate\\Support\\Fluent' => __DIR__ . '/..' . '/illuminate/support/Fluent.php',
        'Illuminate\\Support\\HigherOrderCollectionProxy' => __DIR__ . '/..' . '/illuminate/support/HigherOrderCollectionProxy.php',
        'Illuminate\\Support\\HigherOrderTapProxy' => __DIR__ . '/..' . '/illuminate/support/HigherOrderTapProxy.php',
        'Illuminate\\Support\\HtmlString' => __DIR__ . '/..' . '/illuminate/support/HtmlString.php',
        'Illuminate\\Support\\Manager' => __DIR__ . '/..' . '/illuminate/support/Manager.php',
        'Illuminate\\Support\\MessageBag' => __DIR__ . '/..' . '/illuminate/support/MessageBag.php',
        'Illuminate\\Support\\NamespacedItemResolver' => __DIR__ . '/..' . '/illuminate/support/NamespacedItemResolver.php',
        'Illuminate\\Support\\Pluralizer' => __DIR__ . '/..' . '/illuminate/support/Pluralizer.php',
        'Illuminate\\Support\\ServiceProvider' => __DIR__ . '/..' . '/illuminate/support/ServiceProvider.php',
        'Illuminate\\Support\\Str' => __DIR__ . '/..' . '/illuminate/support/Str.php',
        'Illuminate\\Support\\Testing\\Fakes\\BusFake' => __DIR__ . '/..' . '/illuminate/support/Testing/Fakes/BusFake.php',
        'Illuminate\\Support\\Testing\\Fakes\\EventFake' => __DIR__ . '/..' . '/illuminate/support/Testing/Fakes/EventFake.php',
        'Illuminate\\Support\\Testing\\Fakes\\MailFake' => __DIR__ . '/..' . '/illuminate/support/Testing/Fakes/MailFake.php',
        'Illuminate\\Support\\Testing\\Fakes\\NotificationFake' => __DIR__ . '/..' . '/illuminate/support/Testing/Fakes/NotificationFake.php',
        'Illuminate\\Support\\Testing\\Fakes\\PendingMailFake' => __DIR__ . '/..' . '/illuminate/support/Testing/Fakes/PendingMailFake.php',
        'Illuminate\\Support\\Testing\\Fakes\\QueueFake' => __DIR__ . '/..' . '/illuminate/support/Testing/Fakes/QueueFake.php',
        'Illuminate\\Support\\Traits\\CapsuleManagerTrait' => __DIR__ . '/..' . '/illuminate/support/Traits/CapsuleManagerTrait.php',
        'Illuminate\\Support\\Traits\\Macroable' => __DIR__ . '/..' . '/illuminate/support/Traits/Macroable.php',
        'Illuminate\\Support\\ViewErrorBag' => __DIR__ . '/..' . '/illuminate/support/ViewErrorBag.php',
        'Studiow\\HTML\\Attributes' => __DIR__ . '/..' . '/studiow/html/src/Attributes.php',
        'Studiow\\HTML\\Element' => __DIR__ . '/..' . '/studiow/html/src/Element.php',
        'Studiow\\HTML\\HasAttributesTrait' => __DIR__ . '/..' . '/studiow/html/src/HasAttributesTrait.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit18e45a975f2d349cc3c1ab3731913c78::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit18e45a975f2d349cc3c1ab3731913c78::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit18e45a975f2d349cc3c1ab3731913c78::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit18e45a975f2d349cc3c1ab3731913c78::$classMap;

        }, null, ClassLoader::class);
    }
}
