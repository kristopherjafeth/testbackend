<template>
    <div>
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar Tarea
                </h2>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <NavLink
                            :href="route('tareas.index')"
                            class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#052647] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                        >
                            Volver
                        </NavLink>
                        <form @submit.prevent="submit">
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
                            >
                                <div class="grid grid-cols-1">
                                    <label for="nombrebloque"
                                        >Tarea</label
                                    >
                                    <input
                                        v-model="form.nombre"
                                        type="text"
                                        id="nombrebloque"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="proyecto">Descripcion</label>
                                    <input
                                        v-model="form.descripcion"
                                        type="text"
                                        id="proyecto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    />
                                </div>
                            </div>
<div class="my-2 mx-4 text-right">
    <button
    type="submit"
   class="px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
>
    Guardar
</button>
</div>

                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </div>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";


export default {
    components: {
        AuthenticatedLayout,
        NavLink,
        Head
    },
    props: ["tarea"],

    data(){
        return{
            form:{
                nombre: this.$props.tarea.nombre,
                descripcion: this.$props.tarea.descripcion,
            }
        }
    },
    methods: {
    submit(){
    this.$inertia.put(
        route("tareas.update", this.$props.tarea.id), this.form);
    }
}
}
</script>
