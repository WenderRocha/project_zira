<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import { defaultUpdate, defaultDelete, defaultSubmit } from '@/Composables'
import {ref, useAttrs} from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Alert, Modal, Input, Spinner    } from 'flowbite-vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    revenue: Object,
    revenues: Object,
    showEditModal: Boolean
})

const attrs = useAttrs();
const editMode = ref(props.showEditModal);
const isShowModal = ref(false)

function closeModalEdit(){
    editMode.value = false
}

function edit(id) {
    Inertia.get(route('revenue.update', id), {  }, { replace: true })
}

const revenueEditForm = useForm({
    name: (props.revenue) ? props.revenue.name : ''
})

function closeModal() {
    isShowModal.value = false
    revenueForm.reset();
    revenueForm.errors = {}
}
function showModal() {
    isShowModal.value = true
}
const revenueForm = useForm({
    user_id: attrs.auth.user.id,
    name: ''
})


</script>

<template>
    <AuthenticatedLayout title="Tipos de receita">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight"> Tipos de Receita</h2>

                <Button @click="showModal" variant="success" class="items-center gap-2 max-w-xs">
                    <span>Nova categoria</span>
                </Button>
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">

            <!--START REVENUES DATA-->
            <div v-if="revenues.length > 0">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ação
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="revenue in revenues" :key="revenue.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ revenue.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ revenue.name }}
                                </td>
                                <td class="px-6 py-4 flex gap-3">
                                    <Link :href="route('revenue.update', revenue.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</Link>
                                    <Link @click="defaultDelete(route('revenue.destroy', revenue.id), 'Deseja realmente deletar esse tipo de receita ?', 'Tipo de receia deletada com sucesso!')"
                                          href=""
                                          class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Apagar</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--START REVENUES DATA-->

            <!--IF NOT REVENUES DATA-->
            <Alert v-else type="dark" class="mb-2">Nenhum tipo de receita cadastrado.</Alert>
            <!--IF NOT REVENUES DATA-->

            <!--MODAL EDIT DATA-->
            <Modal v-if="editMode" @close="closeModalEdit">
                <template #header>
                    <div class="flex items-center text-lg">
                    {{ (revenueEditForm) ? revenueEditForm.name : '' }}
                    </div>
                </template>
                <template #body>
                    <Input v-model="revenueEditForm.name" placeholder="" label="Nome" />
                    <span class="text-red-500">{{ revenueEditForm.errors.name }}</span>
                </template>
                <template #footer>
                    <div class="flex justify-between">
                    <button @click="closeModalEdit" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancelar
                    </button>
                    <Button :disabled="revenueEditForm.processing" @click="defaultUpdate(revenueEditForm,
                    route('revenue.update',revenue.id), 'Tipo de receita foi atualizado com sucesso!', closeModalEdit)" variant="info" class="items-center gap-2 max-w-xs">
                        <spinner v-show="revenueEditForm.processing" color="white" size="8" />
                        <span v-if="revenueEditForm.processing">Atualizando...</span>
                        <span v-else>Atualizar</span>
                    </Button>
                    </div>
                </template>
            </Modal>
            <!--END MODAL EDIT DATA-->

            <!--MODAL REGISTER DATA-->
            <Modal v-if="isShowModal" @close="closeModal">
                <template #header>
                    <div class="flex items-center text-lg">
                        {{ (revenueForm.name ) ? revenueForm.name : 'Novo tipo de receita' }}
                    </div>
                </template>
                <template #body>
                    <Input v-model="revenueForm.name" placeholder="" label="Nome" />
                    <span class="text-red-500">{{ revenueForm.errors.name }}</span>
                </template>
                <template #footer>
                    <div class="flex justify-between">
                        <button @click="closeModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancelar
                        </button>
                        <Button :disabled="revenueForm.processing"
                                @click="defaultSubmit(revenueForm,
                                        route('revenue.store'),
                                        'Tipo de receita cadastrado com sucesso!',
                                        closeModal)"
                                variant="primary"
                                class="items-center gap-2 max-w-xs">
                              <spinner v-show="revenueForm.processing" color="white" size="8" />
                              <span v-if="revenueForm.processing">Cadastrando...</span>
                              <span v-else>Cadastrar</span>
                        </Button>
                    </div>
                </template>
            </Modal>
            <!--END REGISTER DATA-->

        </div>
    </AuthenticatedLayout>
</template>
