<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import { defaultUpdate, defaultDelete, defaultSubmit } from '@/Composables'
import {ref, useAttrs} from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Alert, Modal, Input, Spinner    } from 'flowbite-vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    expense: Object,
    expenses: Object,
    showEditModal: Boolean
})

const attrs = useAttrs();
const editMode = ref(props.showEditModal);
const isShowModal = ref(false)

function closeModalEdit(){
    editMode.value = false
}

function edit(id) {
    Inertia.get(route('expense.update', id), {  }, { replace: true })
}

const expenseEditForm = useForm({
    name: (props.expense) ? props.expense.name : ''
})

const expenseForm = useForm({
    user_id: attrs.auth.user.id,
    name: ''
})

function closeModal() {
    isShowModal.value = false
    expenseForm.reset();
    expenseForm.errors = {}
}
function showModal() {
    isShowModal.value = true
}



</script>

<template>
    <AuthenticatedLayout title="Tipos de receita">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight"> Tipos de Despesa</h2>

                <Button @click="showModal" variant="danger" class="items-center gap-2 max-w-xs">
                    <span>Nova categoria</span>
                </Button>
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">

            <!--START EXPENSES DATA-->
            <div v-if="expenses.length > 0">
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
                        <tr v-for="expense in expenses" :key="expense.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ expense.id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ expense.name }}
                            </td>
                            <td class="px-6 py-4 flex gap-3">
                                <Link :href="route('expense.update', expense.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</Link>
                                <Link @click="defaultDelete(route('expense.destroy', expense.id), 'Deseja realmente deletar esse tipo de despesa ?', 'Tipo de despesa deletada com sucesso!')"
                                      href=""
                                      class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Apagar</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--START EXPENSES DATA-->

            <!--IF NOT EXPENSES DATA-->
            <Alert v-else type="dark" class="mb-2">Nenhum tipo de despesa cadastrado.</Alert>
            <!--IF NOT EXPENSES DATA-->

            <!--MODAL EDIT DATA-->
            <Modal v-if="editMode" @close="closeModalEdit">
                <template #header>
                    <div class="flex items-center text-lg">
                        {{ (expenseEditForm) ? expenseEditForm.name : '' }}
                    </div>
                </template>
                <template #body>
                    <Input v-model="expenseEditForm.name" placeholder="" label="Nome" />
                    <span class="text-red-500">{{ expenseEditForm.errors.name }}</span>
                </template>
                <template #footer>
                    <div class="flex justify-between">
                        <button @click="closeModalEdit" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancelar
                        </button>
                        <Button :disabled="expenseEditForm.processing" @click="defaultUpdate(expenseEditForm,
                    route('expense.update',expense.id), 'Tipo de despesa foi atualizado com sucesso!', closeModalEdit)" variant="info" class="items-center gap-2 max-w-xs">
                            <spinner v-show="expenseEditForm.processing" color="white" size="8" />
                            <span v-if="expenseEditForm.processing">Atualizando...</span>
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
                        {{ (expenseForm.name ) ? expenseForm.name : 'Novo tipo de despesa' }}
                    </div>
                </template>
                <template #body>
                    <Input v-model="expenseForm.name" placeholder="" label="Nome" />
                    <span v-if="expenseForm.errors" class="text-red-500">{{ expenseForm.errors.name }}</span>
                </template>
                <template #footer>
                    <div class="flex justify-between">
                        <button @click="closeModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancelar
                        </button>
                        <Button :disabled="expenseForm.processing"
                                @click="defaultSubmit(expenseForm,
                                        route('expense.store'),
                                        'Tipo de despesa cadastrado com sucesso!',
                                        closeModal)"
                                variant="primary"
                                class="items-center gap-2 max-w-xs">
                            <spinner v-show="expenseForm.processing" color="white" size="8" />
                            <span v-if="expenseForm.processing">Cadastrando...</span>
                            <span v-else>Cadastrar</span>
                        </Button>
                    </div>
                </template>
            </Modal>
            <!--END REGISTER DATA-->

        </div>
    </AuthenticatedLayout>
</template>
