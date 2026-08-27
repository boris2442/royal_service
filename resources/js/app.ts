import { createInertiaApp } from '@inertiajs/vue3';
import { initializeTheme } from '@/composables/useAppearance';
import AppLayout from '@/layouts/AppLayout.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import PublicLayout from './layouts/PublicLayout.vue';
import { initializeFlashToast } from '@/lib/flashToast';

import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h, type DefineComponent } from 'vue';

const appName = import.meta.env.VITE_APP_NAME || 'Royal Services';

// Typing explicit du layout retourné (Composant Vue simple ou tableau de composants)
type LayoutType = DefineComponent | [DefineComponent, DefineComponent] | null;

const getLayout = (name: string): LayoutType => {
    if (name === 'Welcome') return null;
    if (name.startsWith('auth/'))
        return AuthLayout as unknown as DefineComponent;
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
        // Pass du générique <DefineComponent> à resolvePageComponent pour éviter le type 'unknown'
        const page = await resolvePageComponent<DefineComponent>(
            `./pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./pages/**/*.vue'),
        );

        // Ingestion sécurisée du layout dynamique
        page.default.layout = page.default.layout || getLayout(name);

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
    progress: {
        color: '#D4A72C',
        showSpinner: false,
    },
});


    initializeTheme();
    initializeFlashToast();

