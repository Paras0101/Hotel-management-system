import csv
import mysql.connector

def generate_report():
    db = mysql.connector.connect(
        host="localhost",
        user="root",
        password="password",
        database="hotel_management"
    )

    cursor = db.cursor()
    cursor.execute("SELECT reservations.*, guests.name AS guest_name FROM reservations JOIN guests ON reservations.guest_id = guests.id")
    reservations = cursor.fetchall()

    with open('reservations_report.csv', mode='w', newline='') as file:
        writer = csv.writer(file)
        writer.writerow(["Guest Name", "Room", "Check-In Date", "Check-Out Date"])
        for reservation in reservations:
            writer.writerow([reservation[-1], reservation[2], reservation[3], reservation[4]])

    print("Report generated: reservations_report.csv")

if __name__ == "__main__":
    generate_report()
