// vite.config.js
import { defineConfig } from "file:///var/www/html/node_modules/vite/dist/node/index.js";
import laravel from "file:///var/www/html/node_modules/laravel-vite-plugin/dist/index.mjs";
var vite_config_default = defineConfig({
  publicDir: "public",
  build: {
    outDir: "public/build"
  },
  plugins: [
    laravel({
      publicDirectory: "public",
      input: [
        "resources/scss/app.scss",
        "resources/js/app.js"
      ],
      refresh: true
    })
  ],
  server: process.env.IS_DDEV_PROJECT ? {
    strictPort: true,
    host: true,
    hmr: {
      host: process.env.DDEV_HOSTNAME.split(",")[0],
      protocol: "wss"
    }
  } : {}
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvdmFyL3d3dy9odG1sXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ZpbGVuYW1lID0gXCIvdmFyL3d3dy9odG1sL3ZpdGUuY29uZmlnLmpzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ltcG9ydF9tZXRhX3VybCA9IFwiZmlsZTovLy92YXIvd3d3L2h0bWwvdml0ZS5jb25maWcuanNcIjtpbXBvcnQge2RlZmluZUNvbmZpZ30gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcblxuZXhwb3J0IGRlZmF1bHQgZGVmaW5lQ29uZmlnKHtcbiAgICBwdWJsaWNEaXI6ICdwdWJsaWMnLFxuICAgIGJ1aWxkOiB7XG4gICAgICAgIG91dERpcjogJ3B1YmxpYy9idWlsZCcsXG4gICAgfSxcbiAgICBwbHVnaW5zOiBbXG4gICAgICAgIGxhcmF2ZWwoe1xuICAgICAgICAgICAgcHVibGljRGlyZWN0b3J5OiAncHVibGljJyxcbiAgICAgICAgICAgIGlucHV0OiBbXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9zY3NzL2FwcC5zY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2FwcC5qcycsXG4gICAgICAgICAgICBdLFxuICAgICAgICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICAgICAgfSksXG4gICAgXSxcbiAgICBzZXJ2ZXI6IHByb2Nlc3MuZW52LklTX0RERVZfUFJPSkVDVCA/IHtcbiAgICAgICAgc3RyaWN0UG9ydDogdHJ1ZSxcbiAgICAgICAgaG9zdDogdHJ1ZSxcbiAgICAgICAgaG1yOiB7XG4gICAgICAgICAgICBob3N0OiBwcm9jZXNzLmVudi5EREVWX0hPU1ROQU1FLnNwbGl0KCcsJylbMF0sXG4gICAgICAgICAgICBwcm90b2NvbDogJ3dzcycsXG4gICAgICAgIH1cbiAgICB9IDoge30sXG59KTtcbiJdLAogICJtYXBwaW5ncyI6ICI7QUFBeU4sU0FBUSxvQkFBbUI7QUFDcFAsT0FBTyxhQUFhO0FBRXBCLElBQU8sc0JBQVEsYUFBYTtBQUFBLEVBQ3hCLFdBQVc7QUFBQSxFQUNYLE9BQU87QUFBQSxJQUNILFFBQVE7QUFBQSxFQUNaO0FBQUEsRUFDQSxTQUFTO0FBQUEsSUFDTCxRQUFRO0FBQUEsTUFDSixpQkFBaUI7QUFBQSxNQUNqQixPQUFPO0FBQUEsUUFDSDtBQUFBLFFBQ0E7QUFBQSxNQUNKO0FBQUEsTUFDQSxTQUFTO0FBQUEsSUFDYixDQUFDO0FBQUEsRUFDTDtBQUFBLEVBQ0EsUUFBUSxRQUFRLElBQUksa0JBQWtCO0FBQUEsSUFDbEMsWUFBWTtBQUFBLElBQ1osTUFBTTtBQUFBLElBQ04sS0FBSztBQUFBLE1BQ0QsTUFBTSxRQUFRLElBQUksY0FBYyxNQUFNLEdBQUcsRUFBRSxDQUFDO0FBQUEsTUFDNUMsVUFBVTtBQUFBLElBQ2Q7QUFBQSxFQUNKLElBQUksQ0FBQztBQUNULENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
