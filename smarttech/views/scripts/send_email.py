# scripts/send_email.py

import smtplib
from email.mime.text import MIMEText

def send_email(to_email, subject, body):
    from_email = "votre_email@smarttech.local"
    password = "votre_mot_de_passe"

    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['From'] = from_email
    msg['To'] = to_email

    try:
        server = smtplib.SMTP('smtp.smarttech.local', 587)
        server.starttls()
        server.login(from_email, password)
        server.sendmail(from_email, [to_email], msg.as_string())
        server.quit()
        print("E-mail envoyé avec succès.")
    except Exception as e:
        print(f"Erreur lors de l'envoi de l'e-mail : {e}")

# Exemple d'utilisation
send_email("destinataire@example.com", "Confirmation d'inscription", "Bienvenue sur Smarttech !")