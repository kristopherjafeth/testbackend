<template>
    <Head title="Panel de Control" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Panel de Control
            </h2>
        </template>

        <div class="grid grid-cols-4 gap-4 my-4 mx-4">
            <div>
                <a
                    href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100"
                >
                    <h5
                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
                    >
                        Tareas
                    </h5>
                    <h5
                        class="mb-2 text-2xl font-bold tracking-tight text-blue-900"
                    >
                        {{ countTareas }}
                    </h5>
                </a>
            </div>


        </div>

    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

export default {
    props: {
        countTareas: "",
    },
    components: {
        AuthenticatedLayout,
        Head,
        NavLink,
    },
};
</script>
