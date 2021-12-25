import Articles from './components/Articles.vue';
import AddArticle from './components/AddArticle.vue';
import UpdateArticle from './components/UpdateArticle.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: Articles
    },
    {
        name: 'add',
        path: '/add',
        component: AddArticle
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: UpdateArticle
    }
];