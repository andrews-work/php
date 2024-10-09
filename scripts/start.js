require('dotenv').config({ path: `config/env/.env.${process.env.NODE_ENV}` });

const { exec } = require('child_process');

const commands = {
  dev: [
    'tailwindcss -i ./src/css/input.css -o ./public/css/output.css --watch',
    'php -S localhost:${PORT} -t public',
    'browser-sync start --config bs-config.js'
  ],
  uat: [
    // Add UAT-specific commands here
  ],
  prod: [
    // Add production-specific commands here
  ]
};

const env = process.env.NODE_ENV;

if (commands[env]) {
  commands[env].forEach(command => {
    console.log(`Executing: ${command}`);
    exec(command, (error, stdout, stderr) => {
      if (error) {
        console.error(`Error executing ${command}: ${error.message}`);
        return;
      }
      if (stderr) {
        console.error(`Stderr from ${command}: ${stderr}`);
        return;
      }
      console.log(`Stdout from ${command}: ${stdout}`);
    });
  });
} else {
  console.error(`Unknown environment: ${env}`);
}
