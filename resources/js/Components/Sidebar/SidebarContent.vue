<script setup>
import PerfectScrollbar from '@/Components/PerfectScrollbar.vue'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import { DashboardIcon } from '@/Components/Icons/outline'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import { TemplateIcon } from '@heroicons/vue/outline'
</script>

<template>
    <PerfectScrollbar
        tagname="nav"
        aria-label="main"
        class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
    >
        <SidebarLink
            title="Dashboard"
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            <template #icon>
                <DashboardIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <SidebarCollapsible
            title="Financeiro"
            :active="route().current('financeiro.*')"
        >
            <template #icon>
                <TemplateIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem
                :href="route('finance.index')"
                title="Controle Financeiro"
                :active="route().current('finance.index')"
            />

            <SidebarCollapsibleItem
                :href="route('revenue.index')"
                title="Tipos de receitas"
                :active="route().current('revenue.index')"
            />

            <SidebarCollapsibleItem
                :href="route('expense.index')"
                title="Tipos de despesas"
                :active="route().current('finance.expense')"
            />

            <SidebarCollapsibleItem
                :href="route('paymentMethod.index')"
                title="Formas de Pagamento"
                :active="route().current('paymentMethod.index')"
            />

            <SidebarCollapsibleItem
                :href="route('receive.index')"
                title="A receber"
                :active="route().current('receive.index')"
            />

            <SidebarCollapsibleItem
                :href="route('payable.index')"
                title="A pagar"
                :active="route().current('payable.index')"
            />

            <SidebarCollapsibleItem
                :href="route('components.buttons')"
                title="Buttons"
                :active="route().current('components.buttons')"
            />
        </SidebarCollapsible>

        <!-- Examples -->
        <!--
        => External link example
        <SidebarLink
            title="Github"
            href="https://github.com/kamona-wd/kui-laravel-breeze"
            external
            target="_blank"
        >
        </SidebarLink>

        => Collapsible examples
        <SidebarCollapsible title="Users" :active="$page.url.startsWith('/users')">
            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="$page.url === '/users/index'" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="$page.url === '/users/create'" />
        </SidebarCollapsible>

        <SidebarCollapsible title="Users" :active="usePage().url.value.startsWith('/users')">
            <template #icon>
                <UserIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="route().current('users.index')" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="route().current('users.create')" />
        </SidebarCollapsible>-->
    </PerfectScrollbar>
</template>
