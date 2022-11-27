<template>
    <div>
        <ul class="flex gap-4 py-3">
            <li class="rounded-full hover:bg-amber-400 bg-gray-200 px-2 py-1 text-xs" v-for="spec in specializations"
                :key="spec.id">{{ spec.specialization }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        specs: {
            type: Array,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>

</style>