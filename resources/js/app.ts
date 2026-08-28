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

type LayoutType = DefineComponent | [DefineComponent, DefineComponent] | null;

const getLayout = (name: string): LayoutType => {
    if (name === 'Welcome') {
        return null;
    }
if (name === 'Realisations') {
        return null;
    }
    if (name.startsWith('auth/')) {
        return AuthLayout as unknown as DefineComponent;
    }

    if (name.startsWith('settings/') || name.startsWith('teams/')) {
        return [AppLayout, SettingsLayout] as unknown as [
            DefineComponent,
            DefineComponent,
        ];
    }

    return PublicLayout as unknown as DefineComponent;
};

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),

    resolve: async (name: string) => {
        const pages = import.meta.glob<DefineComponent>('./pages/**/*.vue');
        const page = await resolvePageComponent<DefineComponent>(
            `./pages/${name}.vue`,
            pages,
        );

        // Assure un comportement prédictif avec les composants ESM
        const defaultPage = page.default;
        if (defaultPage.layout === undefined) {
            defaultPage.layout = getLayout(name);
        }

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
