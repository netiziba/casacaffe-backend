/**
 * On Railway, Nixpacks runs `npm run build`. We only need PHP/composer for the API.
 * Vite 8 + Node 18 on Nixpacks fails (CustomEvent). Skip assets when Railway env is set.
 */
import { execSync } from "node:child_process";

// Railway sets RAILWAY=true during build/deploy; see https://docs.railway.com/develop/variables
if (process.env.RAILWAY || process.env.RAILWAY_ENVIRONMENT) {
  console.log("Skipping Vite build on Railway (API-only deploy).");
  process.exit(0);
}

execSync("vite build", { stdio: "inherit" });
