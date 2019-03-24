
<template>
    <row>
        <i-col>


            <card style="background-color: aliceblue" title="Introduction" id="intr">
            This is a recommendation system based on the data from Bayerische Bibliothek.
            <p>In contrast to the normal recommendation system based on the users data, we want to develop a content-based recommendation system..</p>
                <p>In order to consider <span style="font-weight: bold">Affinity</span> between items, not only the properties in the dataset but also the information about authors in Wikidata are dealt with.</p>
                <p>We want to provide recommendation results according to the similarity between items, which is calculated based on direct and indirect relationships between items or authors . </p>
                <p>Four kinds of relationships are considered:</p>
                <p>   1, Direct relations between two items, e.g.: one item is part of another;</p>
                <p>   2. Indirect relations between two items, that means, two items have common value of properties;</p>
                <p>   3. Direct relations between two authors, e.g.: two authors are family members of each other;</p>
                <p>   4. Indirect relations between two authors, e.g.: two authors are both influenced by another author.</p>
            </card>
            <card style="background-color: aliceblue" title="Instruction" id="inst">
                This is the instruction of how to use the system.
                <p>First, in the homepage, the body of the webpage includes 4 parts: introduction, instruction, data overview and recommendation strategy. We hope that you can get a brief understanding about our system.
                <p>Next, the input box above is the key functional area. You can input keywords in it, if there are items, whose title contain this keyword, the titles will be listed under the box, otherwise, it shows no matches;</p>
                <p>Then, you can press the search button to get to a new page showing relevant items with the keywords;</p>
                <p>After that, choose one item that you are interested in, to have a look at the recommended results.</p>
                <p>Finally, the recommendation results with some detailed information are listed. </p>
            </card>

            <card style="background-color: aliceblue" title="Data Overview" id="data">
               <p>There are 110,698,504 distinct items in the original dataset, which contain 27 types of items, including Text, Document, Books, etc.</p>
                <p>After removing the items without dct:subject and whose authors don't exist in Wikidata, the dataset is reduced by 3,352,567 items.</p>
                <p>There are more than 1000 properties in the original dataset, at last, 499 of them are used when recommending, including </p>
                <p>In the recommendation process, the author data from Wikidata are also dealt with, which contain information about 246,430 distinct authors.</p>
            </card>
            <card style="background-color: aliceblue" title="Recommendation Strategy" id="stra">
                <p>First, 1000 items are randomly selected from the original dataset.</p>
                <p>For each item, find candidates, which have the same subject and language as it.</p>
                <p>Assign different weights to each property in the dataset.</p>
                <p>Calculate the score of each candidate. The score is calculated based on the same value of properties.</p>
               <p>The higher the score is, the more similar and related the candidate is.</p>
                <p>The candidates with higher scores are listed in the front. As last, we show maximum 400 recommended candidates to each given item.</p>
            </card>


        </i-col>
    </row>
</template>

<script>
    export default {
        data() {
            return {
                items: [],
                pages: {
                    page: 1,
                    pageSize: 20,
                    total: 0
                }
            }
        },
        methods: {
            getItems() {
                this.$request('/item/index', {page: this.pages.page, pageSize: this.pages.pageSize}).then(res => {
                    this.items = res.data;
                    this.pages = res.pages;
                })
            }
        },
        created() {
            this.getItems()
        }
    }
</script>

<style scoped>

</style>