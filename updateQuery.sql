ALTER TABLE `payment`
DROP FOREIGN KEY fk_summonid_payment;

ALTER TABLE `payment`
DROP COLUMN `SummonID`; 

CREATE TABLE Summon_Payment(
    PaymentID int(11) NOT NULL,
    SummonID int(11) NOT NULL,
    CONSTRAINT PK_Summon_Payment PRIMARY KEY(PaymentID,SummonID),
    FOREIGN KEY(PaymentID) REFERENCES Payment(PaymentID),
    FOREIGN KEY(SummonID) REFERENCES Summon(SummonID)
);

ALTER TABLE `traffic_enforcement_assistance_system`.`summon_payment` ADD INDEX `PaymentID` (`PaymentID`); 