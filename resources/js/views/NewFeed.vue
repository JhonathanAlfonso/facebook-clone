<template>
    <div class="flex flex-col items-center py-4">
        <NewPost />
    </div>
</template>

<script>
import NewPost from "../components/NewPost";

export default {
    name: "NewFeed",

    components: {
        NewPost
    }
}
</script>

<style scoped>

</style>
