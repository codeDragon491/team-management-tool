<template>
<!-- Sidebar -->
<div class="sidebar__layout">
  <div class="sidebar__trigger" href="#0">
     <div class="burger">
      <span class="w-full p-1"></span>
      <span class="w-full p-1"></span>
      <span class="w-full p-1"></span>
     </div>
     <logo class="md:hidden center"></logo> 
  </div> 
  <nav class="sidebar__nav">
     <logo class="hidden md:block center mt-3"></logo>
     <ul>
      <router-link tag="li" class="sidebar__nav-link" to="/project-requests">
         <svg version="1.1" id="__3CyqUQ4__Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 191.1 423" style="enable-background:new 0 0 191.1 423;" xml:space="preserve"><g fill="white"><polygon points="173.7,250.4 168.2,242.4 191.1,226.5 160,232.1 165.6,240.2 142.7,256.1 "></polygon><polygon points="22.1,238.2 0,221.2 14.9,249 20.8,241.2 43,258.2 28.1,230.4 "></polygon><path d="M38.8,286.1l0.1,23.8c-15.9,0.6-28.6,13.7-28.6,29.8v11.9c0,1.9,1.6,3.5,3.5,3.5h155.3c1.9,0,3.5-1.6,3.5-3.5v-11.9 c0-15.3-11.5-27.9-26.3-29.6l-0.1-24.7l0,0l0,0c0-4.7-5.5-7.7-17.6-9.9c-9.7-1.7-22.5-2.6-36.1-2.6c-13.6,0.1-26.4,1.1-36.1,3 C44.2,278.3,38.8,281.4,38.8,286.1z M139.3,310.8c-2.6,2.3-18.5,6.5-46.6,6.6c-4.6,0-8.8-0.1-12.7-0.2v-11.4c0-1.1-0.9-2-2-2 s-2,0.9-2,2V317c-2.6-0.2-5-0.3-7.2-0.6v-18.9c6.8,0.6,14.3,1,22.1,1c0.6,0,1.1,0,1.7,0c13.6-0.1,26.4-1.1,36.1-3 c4.4-0.8,7.9-1.8,10.5-2.9L139.3,310.8z M64.8,316c-10.9-1.3-17.2-3.3-18.8-4.7l-0.1-18.1c2.7,1,6.2,1.9,10.6,2.7 c2.6,0.5,5.4,0.9,8.3,1.2C64.8,297.1,64.8,316,64.8,316z M165.6,339.7v8.4H17.3v-8.4c0-12.6,10.2-22.8,22.8-22.8h1.6 c2.7,2.1,7.6,3.7,14.9,5c9.3,1.7,21.5,2.6,34.4,2.6c0.6,0,1.1,0,1.7,0c13.6-0.1,26.4-1.1,36.1-3c6.6-1.3,11.1-2.7,14-4.6l0,0 C155.4,316.9,165.6,327.1,165.6,339.7z M92.5,280c25.8-0.2,41.3,3.2,45.8,5.5c-4.4,2.4-20,5.9-45.7,6c-25.8,0.2-41.3-3.2-45.8-5.5 C51.2,283.7,66.7,280.2,92.5,280z"></path><path d="M62.4,108.8c0-0.1,0-0.1,0-0.2l-3.8-56.2c-0.1-1.9-1.8-3.4-3.7-3.3c-1.9,0.1-3.4,1.8-3.3,3.7l3.8,56.1l0.5,77.2 c0,20.2,16.5,36.7,36.7,36.7s36.7-16.5,36.7-36.7l0.5-77.6l3.8-55.7c0.1-1.9-1.3-3.6-3.3-3.7c-1.9-0.1-3.6,1.3-3.7,3.3l-3.8,55.8 c0,0.1,0,0.1,0,0.2l-0.5,77.7c0,16.4-13.3,29.7-29.7,29.7s-29.7-13.3-29.7-29.7L62.4,108.8z"></path><path d="M111,155.5c-18.4-6.8-35.8-0.3-36.6,0c-1.4,0.5-2.3,1.9-2.2,3.3l0,0v28.9c0,10.6,9.2,19.3,20.5,19.3s20.5-8.7,20.5-19.3 v-28.9c0,0,0,0,0-0.1C113.3,157.4,112.4,156,111,155.5z M92.7,203.1c-9.1,0-16.5-6.9-16.5-15.3v-25.5c0.3,0,0.5-0.1,0.7-0.2 c0.2-0.1,15.6-5.9,31.6,0c0.2,0.1,0.5,0.1,0.7,0.2v25.5C109.2,196.2,101.8,203.1,92.7,203.1z"></path><path d="M65.6,69.7c-0.5,1-0.2,2.2,0.8,2.7c0.7,0.4,11.8,6.4,26.8,6.4c7.7,0,16.4-1.6,25.2-6.4c1-0.5,1.3-1.7,0.8-2.7 s-1.7-1.3-2.7-0.8c-24,12.9-47.9,0.2-48.2,0C67.4,68.4,66.2,68.7,65.6,69.7z"></path><path d="M92.9,87.9c4.9,0,10.4-1,16-4c1-0.5,1.3-1.7,0.8-2.7s-1.7-1.3-2.7-0.8c-14.4,7.8-29,0.1-29.1,0c-1-0.5-2.2-0.2-2.7,0.8 S75,83.4,76,83.9C76.4,84.1,83.5,87.9,92.9,87.9z"></path><path d="M84.1,62.9c-1-0.5-2.2-0.2-2.7,0.8c-0.5,1-0.2,2.2,0.8,2.7c0.3,0.2,4.7,2.5,10.5,2.5c3,0,6.4-0.6,9.9-2.5 c1-0.5,1.3-1.7,0.8-2.7c-0.5-1-1.7-1.3-2.7-0.8C92.5,67.3,84.5,63.1,84.1,62.9z"></path><path d="M92.5,250c-1.1,0-2,0.9-2,2v11c0,1.1,0.9,2,2,2s2-0.9,2-2v-11C94.5,250.9,93.6,250,92.5,250z"></path><path d="M94.5,230c0-1.1-0.9-2-2-2s-2,0.9-2,2v11c0,1.1,0.9,2,2,2s2-0.9,2-2V230z"></path></g></svg>
         <em>Project Requests</em>
      </router-link>
      <router-link tag="li" class="sidebar__nav-link" to="/project-teams">
         <svg version="1.1" id="__JzFRSX1__Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 301.1 423" style="enable-background:new 0 0 301.1 423;" xml:space="preserve"><g fill="white"><polygon points="162.4,124.8 152.7,123.3 156.9,95.7 139.7,122.2 149.4,123.6 145.2,151.3"></polygon><path d="M37.7,209.6c-0.4-1.9-2.3-3.1-4.2-2.7c-1.9,0.4-3.1,2.3-2.7,4.2c2.2,10.1,11.4,17.4,21.7,17.4s19.4-7.3,21.7-17.4c0.4-1.9-0.8-3.8-2.7-4.2s-3.8,0.8-4.2,2.7c-1.5,6.9-7.8,11.9-14.9,11.9S39.3,216.5,37.7,209.6z"></path><path d="M23.9,195.3c1.9,0,3.5-1.6,3.5-3.5c0-4.2,3.4-7.5,7.5-7.5s7.5,3.4,7.5,7.5c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-8-6.5-14.5-14.5-14.5s-14.5,6.5-14.5,14.5C20.4,193.8,22,195.3,23.9,195.3z"></path><path d="M59.2,195.3c1.9,0,3.5-1.6,3.5-3.5c0-4.2,3.4-7.5,7.5-7.5s7.5,3.4,7.5,7.5c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-8-6.5-14.5-14.5-14.5s-14.5,6.5-14.5,14.5C55.7,193.8,57.3,195.3,59.2,195.3z"></path><path d="M169.6,241c-1.9-0.4-3.8,0.8-4.2,2.7c-1.5,6.9-7.8,11.9-14.9,11.9s-13.3-5-14.9-11.9c-0.4-1.9-2.3-3.1-4.2-2.7c-1.9,0.4-3.1,2.3-2.7,4.2c2.2,10.1,11.4,17.4,21.7,17.4s19.4-7.3,21.7-17.4C172.7,243.3,171.5,241.4,169.6,241z"></path><path d="M140.5,225.9c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-8-6.5-14.5-14.5-14.5s-14.5,6.5-14.5,14.5c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-4.2,3.4-7.5,7.5-7.5S140.5,221.8,140.5,225.9z"></path><path d="M168.3,211.4c-8,0-14.5,6.5-14.5,14.5c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-4.2,3.4-7.5,7.5-7.5s7.5,3.4,7.5,7.5c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5C182.8,217.9,176.3,211.4,168.3,211.4z"></path><path d="M233.8,272.7c-0.4-1.9-2.3-3.1-4.2-2.7s-3.1,2.3-2.7,4.2c2.2,10.1,11.4,17.4,21.7,17.4c10.3,0,19.4-7.3,21.7-17.4c0.4-1.9-0.8-3.8-2.7-4.2c-1.9-0.4-3.8,0.8-4.2,2.7c-1.5,6.9-7.8,11.9-14.9,11.9S235.3,279.6,233.8,272.7z"></path><path d="M219.9,258.5c1.9,0,3.5-1.6,3.5-3.5c0-4.2,3.4-7.5,7.5-7.5s7.5,3.4,7.5,7.5c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-8-6.5-14.5-14.5-14.5s-14.5,6.5-14.5,14.5C216.4,256.9,218,258.5,219.9,258.5z"></path><path d="M255.2,258.5c1.9,0,3.5-1.6,3.5-3.5c0-4.2,3.4-7.5,7.5-7.5s7.5,3.4,7.5,7.5c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-8-6.5-14.5-14.5-14.5s-14.5,6.5-14.5,14.5C251.7,256.9,253.3,258.5,255.2,258.5z"></path><path d="M32.3,320.7h69.3c0.1,0,0.1,0,0.2,0s0.1,0,0.2,0h97.6h0.5h72.3c15.8,0,28.7-12.9,28.7-28.7v-41c0-27.3-22.2-49.6-49.6-49.6h-5.9c-17.7,0-33.3,9.3-42.1,23.4v-3.9c0-27.3-22.2-49.6-49.6-49.6H148c-18.3,0-34.3,10-42.9,24.8v-11.5c0-27.3-22.2-49.6-49.6-49.6h-5.9C22.3,135,0,157.2,0,184.6v103.9C0,306.2,14.5,320.7,32.3,320.7z M245.6,208.5h5.9c23.5,0,42.6,19.1,42.6,42.6V292c0,12-9.7,21.7-21.7,21.7h-68.8v-69.4C206.8,224,224.4,208.5,245.6,208.5z M105.5,220.9c0-23.5,19.1-42.6,42.6-42.6h5.9c23.5,0,42.6,19.1,42.6,42.6v22.9c-0.3,2.4-0.5,4.8-0.5,7.2v62.7h-90.6L105.5,220.9L105.5,220.9zM7,184.6C7,161.1,26.1,142,49.6,142h5.9c23.5,0,42.6,19.1,42.6,42.6v129.1H32.3C18.4,313.7,7,302.4,7,288.4V184.6L7,184.6z"></path></g></svg>
         <em>Project Teams</em>
      </router-link>
     </ul>
  </nav>
</div>
</template>
<script>
import Logo from '../components/logo.vue';
export default {
    name: "side-bar",
    components: {Logo}    
}
</script>
<style>
/* Primary Styles */
*, *::before, *::after {
   box-sizing: border-box;
}
em {
   font-style: normal;
   font-weight: 500;
   font-family: National-Book;
}

a {
   text-decoration: none;
   color: inherit;
} 
/*Center logo*/
.center {
   position: absolute;
   margin-left: -40px;
   left: 50%; 
}
/* Layout */
.sidebar__layout {
   display: flex;
   width: 100%;
   height: auto;
}

.sidebar-layout__content {
   display: flex;
   justify-content: center;
   align-items: center;
   flex: 1;
}

/* Sidebar */
.sidebar__trigger {
   z-index: 2;
   display: flex;
   align-items: center;
   width: 100%;
   height: 4rem;
   background: #ff1a45;
}

.sidebar__trigger > .burger {
   justify-self: flex-start;
   margin-left: 1rem;
   width: 2rem;
   height: 2rem;
}
.sidebar__trigger > .burger > span{
  display: block;
  border-top: 2px solid #ffffff;
}
.sidebar__nav {
   position: fixed;
   top: 0;
   left: -15rem;
   overflow: hidden;
   transition: all .3s ease-in;
   width: 15rem;
   height: 100%;
   background: #ff2b53;
   color: rgba(255, 255, 255, 0.7);
}

.sidebar__nav:hover,
.sidebar__nav:focus,
.sidebar__trigger:focus + .sidebar__nav,
.sidebar__trigger:hover + .sidebar__nav {
   left: 0;
}

.sidebar__nav ul {
   position: absolute;
   top: 4rem;
   margin: 0;
   padding: 0;
   width: 15rem;
}

.sidebar__nav ul li {
   width: 100%;
}

.sidebar__nav-link {
   cursor: pointer;
   position: relative;
   display: flex;
   align-items: center;
   width: 100%;
   height: 4rem;
   color: white;
}

.sidebar__nav-link em {
   margin-left: .5rem;
}

.sidebar__nav ul:hover .sidebar__nav-link{ 
   opacity: 0.7;
}

.sidebar__nav ul:hover .sidebar__nav-link:hover{ 
   opacity: 1;
}
.sidebar__nav ul li a{ 
   display: block;
}


.sidebar__nav-link > svg {
   margin-left: .5rem;
   width: 3rem;
   height: 3rem;
}

.sidebar__nav-link > svg::before {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
}

/* Mobile First */
@media (min-width: 42rem) {
   .sidebar__layout {
      max-width: 15rem;
      width: auto;
   }
   .sidebar-layout__content {
      margin-left: 4rem;
   }
   
   /* Sidebar */
   .sidebar__trigger {
      width: 4rem;
   }

   .sidebar__nav {
      width: 4rem;
      left: 0;
   }
    sidebar__nav-link > svg {
      left: .5rem;
   }
   
   .sidebar__nav:hover,
   .sidebar__nav:focus,
   .sidebar__trigger:hover + .sidebar__nav,
   .sidebar__trigger:focus + .sidebar__nav {
      width: 15rem;
   }
}

@media (min-width: 68rem) {
   .sidebar__layout {
      width: 100%;
   }
   .sidebar-layout__content {
      margin-left: 15rem;
   }
   
   /* Sidebar */
   .sidebar__trigger {
      display: none
   }
   
   .sidebar__nav {
      width: 15rem;
   }
}

</style>

