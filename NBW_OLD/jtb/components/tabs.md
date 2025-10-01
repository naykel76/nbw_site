# Tabs (Requires Alpine.js)


<div x-data="{ activeTab: 'profile' }">
    <!-- Tabs Navigation -->
    <div class="tabs">
        <button type="button"
            @click="activeTab = 'profile'"
            :class="activeTab === 'profile' ? 'tab-active' : 'tab-inactive'"
            class="tab-btn">
            Profile
        </button>
        <button type="button"
            @click="activeTab = 'settings'"
            :class="activeTab === 'settings' ? 'tab-active' : 'tab-inactive'"
            class="tab-btn">
            Settings
        </button>
    </div>
    <div class="mt">
        <div x-show="activeTab === 'profile'" class="mt">
            Profile Content
        </div>
        <div x-show="activeTab === 'settings'" class="mt">
            Settings Content
        </div>
    </div>
</div>

```html
<div x-data="{ activeTab: 'profile' }">
    <!-- Tabs Navigation -->
    <div class="tabs">
        <button type="button"
            @click="activeTab = 'profile'"
            :class="activeTab === 'profile' ? 'tab-active' : 'tab-inactive'"
            class="tab-btn">
            Profile
        </button>
        <button type="profile"
            @click="activeTab = 'settings'"
            :class="activeTab === 'settings' ? 'tab-active' : 'tab-inactive'"
            class="tab-btn">
            Settings
        </button>
    </div>
    <div class="mt">
        <div x-show="activeTab === 'profile'" class="mt">
            Profile Content
        </div>
        <div x-show="activeTab === 'settings'" class="mt">
            Settings Content
        </div>
    </div>
</div>
```