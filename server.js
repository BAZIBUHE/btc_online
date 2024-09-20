const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');

const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Transporteur pour envoyer des emails
const transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'your-email@gmail.com', // Votre adresse e-mail
    pass: 'your-email-password' // Votre mot de passe
  }
});

// Route pour traiter les paiements
app.post('/process-payment', (req, res) => {
  const { payment_method, transaction_reference } = req.body;

  if (!payment_method || !transaction_reference) {
    return res.status(400).send('Informations de paiement manquantes.');
  }

  // Envoyer un e-mail de confirmation
  const mailOptions = {
    from: 'your-email@gmail.com',
    to: 'contact@btcplatform.com', // L'adresse où les confirmations doivent être envoyées
    subject: 'Nouvelle inscription - Confirmation de paiement',
    text: `Mode de paiement: ${payment_method}\nRéférence de transaction: ${transaction_reference}`
  };

  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      return res.status(500).send('Erreur lors de l\'envoi de l\'e-mail.');
    }
    res.send('Votre paiement a été enregistré avec succès. Merci !');
  });
});

app.listen(port, () => {
  console.log(`Serveur à l'écoute sur http://localhost:${port}`);
});
