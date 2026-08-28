
import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h, type DefineComponent } from 'vue';

import AppLayout from '@/layouts/AppLayout.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import PublicLayout from '@/layouts/PublicLayout.vue';

import { initializeTheme } from '@/composables/useAppearance';
import { initializeFlashToast } from '@/lib/flashToast';

const appName = import.meta.env.VITE_APP_NAME || 'Royal Services';

type LayoutType =
    | DefineComponent
    | [DefineComponent, DefineComponent]
    | null;

const getLayout = (name: string): LayoutType => {
    if (name === 'Welcome') {
        return null;
    }

    if (name.startsWith('auth/')) {
        return AuthLayout as unknown as DefineComponent;
    }

    if (
        name.startsWith('settings/') ||
        name.startsWith('teams/')
    ) {
        return [
            AppLayout,
            SettingsLayout,
        ] as unknown as [
            DefineComponent,
            DefineComponent,
        ];
    }

    return PublicLayout as unknown as DefineComponent;
};





router.on('before', (event) => {
    console.log('🟡 INERTIA before:', {
        url: event.detail.visit.url,
        method: event.detail.visit.method,
    });
});

router.on('start', (event) => {
    console.log('🟢 INERTIA start:', event.detail.visit.url);
});

router.on('progress', (event) => {
    console.log('🔵 INERTIA progress:', event.detail.progress);
});

router.on('finish', (event) => {
    console.log('🟣 INERTIA finish:', {
        url: event.detail.visit.url,
        completed: event.detail.visit.completed,
        interrupted: event.detail.visit.interrupted,
        cancelled: event.detail.visit.cancelled,
    });
});

router.on('navigate', (event) => {
    console.log('🚀 INERTIA navigate:', event.detail.page.url);
});

router.on('exception', (event) => {
    console.error('💥 INERTIA exception:', event.detail.exception);
});












createInertiaApp({
    title: (title) =>
        title ? `${title} - ${appName}` : appName,

    resolve: async (name: string) => {
        const page = await resolvePageComponent<DefineComponent>(
            `./pages/${name}.vue`,
            import.meta.glob<DefineComponent>(
                './pages/**/*.vue',
            ),
        );

        page.default.layout =
            page.default.layout || getLayout(name);

        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({
            render: () => h(App, props),
        })
            .use(plugin)
            .mount(el);
    },

    progress: {
        color: '#D4A72C',
        showSpinner: false,
    },
});

/*
|--------------------------------------------------------------------------
| Initialisations globales
|--------------------------------------------------------------------------
*/

initializeTheme();
initializeFlashToast();

