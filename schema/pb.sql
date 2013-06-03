SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `onlytigers` ;
CREATE SCHEMA IF NOT EXISTS `onlytigers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `onlytigers` ;

-- -----------------------------------------------------
-- Table `onlytigers`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onlytigers`.`user` ;

CREATE  TABLE IF NOT EXISTS `onlytigers`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `salt` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `lastLogIn` TIMESTAMP NULL ,
  `rights` INT NOT NULL DEFAULT 0 ,
  `status` INT NOT NULL DEFAULT 1 ,
  `gender` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `user_UNIQUE` (`user` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onlytigers`.`picture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onlytigers`.`picture` ;

CREATE  TABLE IF NOT EXISTS `onlytigers`.`picture` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fileNAme` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(511) NULL ,
  `fileType` VARCHAR(45) NOT NULL ,
  `imageDataS` BLOB NOT NULL ,
  `imageDataM` BLOB NOT NULL ,
  `imageData` BLOB NOT NULL ,
  `user_id` INT NOT NULL ,
  `uploaded` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `fileSize` VARCHAR(45) NULL ,
  `status` INT NOT NULL DEFAULT 0 ,
  `upVote` INT NOT NULL DEFAULT 0 ,
  `downVote` INT NOT NULL DEFAULT 0 ,
  `score` FLOAT NOT NULL DEFAULT 0 ,
  `views` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_picture_user` (`user_id` ASC) ,
  CONSTRAINT `fk_picture_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `onlytigers`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onlytigers`.`tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onlytigers`.`tags` ;

CREATE  TABLE IF NOT EXISTS `onlytigers`.`tags` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(255) NOT NULL ,
  `tag` VARCHAR(127) NOT NULL ,
  `status` INT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `tag_UNIQUE` (`tag` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onlytigers`.`picture_has_tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onlytigers`.`picture_has_tags` ;

CREATE  TABLE IF NOT EXISTS `onlytigers`.`picture_has_tags` (
  `picture_id` INT NOT NULL ,
  `tags_id` INT NOT NULL ,
  PRIMARY KEY (`picture_id`, `tags_id`) ,
  INDEX `fk_picture_has_tags_tags1` (`tags_id` ASC) ,
  INDEX `fk_picture_has_tags_picture1` (`picture_id` ASC) ,
  CONSTRAINT `fk_picture_has_tags_picture1`
    FOREIGN KEY (`picture_id` )
    REFERENCES `onlytigers`.`picture` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_picture_has_tags_tags1`
    FOREIGN KEY (`tags_id` )
    REFERENCES `onlytigers`.`tags` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onlytigers`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `onlytigers`.`comment` ;

CREATE  TABLE IF NOT EXISTS `onlytigers`.`comment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `text` VARCHAR(511) NULL ,
  `picture_id` INT NOT NULL ,
  `upVote` INT NOT NULL DEFAULT 0 ,
  `downVote` INT NOT NULL DEFAULT 0 ,
  `score` FLOAT NOT NULL DEFAULT 0 ,
  `status` INT NOT NULL DEFAULT 1 ,
  `user_id` INT NOT NULL ,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_comment_picture1` (`picture_id` ASC) ,
  INDEX `fk_comment_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_comment_picture1`
    FOREIGN KEY (`picture_id` )
    REFERENCES `onlytigers`.`picture` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `onlytigers`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
